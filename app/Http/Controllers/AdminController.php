<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function showProducts(){
        return view('admin.products');
    }
    function showUsers(){
        return view('admin.users');
    }
}
