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
}
