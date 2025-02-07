<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function showProduct(){
        return view('user.products');
    }
    function addProduct(){
        return view('user.addProduct');
    }
    
    function showProfile($id){
        $user = User::find($id);
        return view('user.profile', ["data" => $user]);
    }

    function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'phone' => 'sometimes|integer',
            'address' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:3000',
        ],[
            'phone.integer' => 'Phone number must be a number',
        ]);
    
        $user = User::find($id);
    
        if(!$user){  
            return redirect()->route('profile', ['id' => $id])->with('error', 'User not found');
        }
    
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }
        if ($request->has('address')) {
            $user->address = $request->address;
        }
    
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }
    
        $user->save();  // Make sure to save the user after updating
        session(['user_image' => $user->image]);
        if($user->role == 'admin'){
            return redirect()->route('admprofile', ['id' => $id])->with('success', 'User updated successfully');
        }
        return redirect()->route('profile', ['id' => $id])->with('success', 'User updated successfully');
    }

    function showCart(){
        return view('user.cart');
    }

    function myProducts(){
        return view('user.myproducts');
    }
}
