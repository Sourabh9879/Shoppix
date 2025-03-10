<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function ShowSignup(){
        return view('signup');
    }
    function ShowLogin(){
        return view('login');
    }
    function ShowAdminDash(){

        $totalUsers = User::where('role', 'user')->count();
        
        $totalProducts = Product::count();
        
        $activeUsers = User::where('role', 'user')
                          ->where('status', 1)
                          ->count();
        
        $freezedUsers = User::where('role', 'user')
                           ->where('status', 0)
                           ->count();
        
        $products = Product::latest()
                          ->take(5)
                          ->get();

        return view('Admin.admdash', compact(
            'totalUsers',
            'totalProducts',
            'activeUsers',
            'freezedUsers',
            'products'
        ));
    }
    function ShowUserDash(){
        $userId = session('user_id');
        
        // Get counts
        $myProducts = Product::where('user_id', $userId)->count();
        $cartItems = Cart::where('user_id', $userId)->count();
        $totalProducts = Product::count();
        
        // Get recent products
        $recentProducts = Product::latest()
                                ->take(5)
                                ->get();
        
        return view('User.userdash', compact('myProducts', 'cartItems', 'totalProducts', 'recentProducts'));
    }

    function RegisterUser(Request $request){

       $valid = $request->validate([
            'name' => 'required | string | max:16 |regex:/^[a-zA-Z\s]+$/ ',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | min:4 | confirmed'
        ],[
            'name.required' => 'Name is required.',
            'name.regex' => 'Name cannot contain numbers.',
            'email.unique' => 'This Email is already registered.Try again with another email.',
            'password.min' => 'Password must me minimum 4 characters.',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Confirm Password Does Not Match',
        ]);

        $otp = rand(100000, 999999);

        Session::put('user_data', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Session::put('otp', $otp);

        Mail::send('emails.register-otp', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email)->subject('Email Verification OTP');
        });

        return redirect()->route('otp.verification')->with('success', 'OTP sent to your email. Please verify.');
    }

    function LoginUser(Request $data){
        $data->validate([
            'email' => 'required | email ',
            'password' => 'required '
        ],
    [
        'email.required' => 'Email is required.',
        'password.required' => 'Password is required.',
    ]);
    
        $user = User::where('email', $data->email)->first();
        if($user && Hash::check($data->password, $user->password)){
            session([
                'name' => $user->name,
                'user_id' => $user->id,
                'role' => $user->role,
                'status' => $user->status,
                'user_image' => $user->image
            ]);
            
            if($user->role === 'admin') {
                return redirect()->route('admdash');
            } else {
                return redirect()->route('userdash');
            }
        } else {
            return redirect()->route('login')->with('failed','Invalid Credentials');
        }
    }

    public function LogoutUser(){
        session()->flush(); 
        return redirect()->route('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(\Illuminate\Http\Request $request)
    {
        if ($request->has('error')) {
            return redirect()->route('login')->withErrors(['message' => 'Google login was canceled.']);
        }

        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'password' => bcrypt('password')
        ]);

        Auth::login($user);
        session([
            'name' => $user->name,
            'user_id' => $user->id,
            'role' => $user->role,
            'status' => $user->status,
            'user_image' => $user->image
        ]);

        return redirect('/userdash');
    }

    function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required | min:4',
            'confirm_password' => 'required | same:new_password'
        ],
        [
            'old_password.required' => 'Old Password is required.',
            'new_password.required' => 'New Password is required.',
            'new_password.min' => 'Password must be minimum 4 characters.',
            'confirm_password.required' => 'Confirm Password is required.',
            'confirm_password.same' => 'Passwords do not match.'
        ]);

        $user = User::find(session('user_id'));
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success','Password Changed Successfully');
        } else {
            return redirect()->back()->with('failed','Old Password is Incorrect');
        }
    }

    function ShowForget(){
        return view('forgetpassword');
    }

    function ShowPass(){
        if(session('user_email.email')){
            return view('PasswordForm');
        }
        return redirect()->route('forget');
       
    }

    function ForgetPassword(Request $request){

        $valid = $request->validate([
            'email' => 'required | email',
        ],[
            'email.email' => 'Invalid Email.',
            'email.exists' => 'This Email is not registered.',
            'email.required' => 'Email is required.',
        ]);

        $data = User::where('email', $request->email)->first();
        if($data){

        $otp = rand(100000, 999999);

        Session::put('user_email', [
            'email' => $request->email,
        ]);

        Session::put('otp', $otp);
        Session::put('name', $data->name);

        Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Password OTP');
        });

        return redirect()->route('forget')->with('success', 'OTP sent to your email. Please verify.');
    }else{
        return redirect()->route('forget')->with('failed', 'Email Not Found');
    }
    }

    function handlePassword(Request $request){
        $data = $request->validate([
            'new_password' => 'required|min:4|confirmed',
            'new_password_confirmation' => 'required'
        ],[
            'new_password.required' => 'Password is required.',
            'new_password.min' => 'Password must be minimum 4 characters.',
            'new_password.confirmed' => 'Passwords do not match.',
            'new_password_confirmation.required' => 'Password confirmation is required.'
        ]);

        $user = User::where('email', session('user_email.email'))->first();
        if ($user) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            Session::forget(['otp', 'user_email']);
            return redirect()->route('login')->with('success', 'Password Changed. You Can Now Login.');
        } else {
            return redirect()->route('forget')->with('failed', 'User not found.');
        }
    }
}