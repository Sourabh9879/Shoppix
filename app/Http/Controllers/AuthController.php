<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function ShowSignup(){
        return view('signup');
    }
    function ShowLogin(){
        return view('login');
    }
    function ShowAdminDash(){
        return view('Admin.admdash');
    }
    function ShowUserDash(){
        return view('User.userdash');
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
            session()->put('name', $user->name);
            session()->put('user_id', $user->id);
            session()->put('role', $user->role);
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