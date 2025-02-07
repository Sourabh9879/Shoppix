<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showProduct(){
        return view('user.products');
    }
    function addProduct(){
        return view('user.addProduct');
    }
    function showProfile(){
        return view('user.profile');
    }
    function showCart(){
        return view('user.cart');
    }
    function myProducts(){
        return view('user.myproducts');
    }
}
