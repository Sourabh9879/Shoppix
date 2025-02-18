<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Cart;

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
        
        $blockedUsers = User::where('role', 'user')
                           ->where('status', 0)
                           ->count();
        
        $products = Product::latest()
                          ->take(5)
                          ->get();

        return view('Admin.admdash', compact(
            'totalUsers',
            'totalProducts',
            'activeUsers',
            'blockedUsers',
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

    function RegisterUser(Request $data){

       $valid = $data->validate([
            'name' => 'required | string | max:16 |regex:/^[a-zA-Z\s]+$/ ',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | min:4'
        ],[
            'name.required' => 'Name is required.',
            'name.regex' => 'Name cannot contain numbers.',
            'email.unique' => 'This Email is already registered.Try again with another email.',
            'password.min' => 'Password must me minimum 4 characters.',
            'password.required' => 'Password is required',
        ]);

        if(!$valid){
            return redirect()->route('signup')->withInput();
        }

        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();
        
        if($user){
            return redirect()->route('login')->with('success','User Created Successfully');
        }

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

    
}