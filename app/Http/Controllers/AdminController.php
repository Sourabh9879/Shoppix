<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function showProducts(){
        $product = Product::all();
        return view('admin.products', ["data" => $product]);
    }
    function showUsers(){
        $user = User::where('role','user')->get();
        return view('admin.users',["data" => $user]);
    }
    function showadmProfile($id){
        $user = User::find($id);
        return view('admin.admprofile', ["data" => $user]);
    }

    function DeleteProduct($id){
        $product = Product::find($id);
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect('admin-products');
    }

    function deleteUser($id){
        $user = User::findorfail($id);
        $user->delete();
        return redirect('users');
    }

    function BlockUser($id){
            $user = User::findorFail($id);
            $user->status = false;
            $user->save();
            return redirect('users');
    }
    function UnBlockUser($id){
            $user = User::findorFail($id);
            $user->status = true;
            $user->save();
            return redirect('users');
    }

    function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
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

    function ShowAdminDash(){
        // Get total users (excluding admin)
      
    }

}
