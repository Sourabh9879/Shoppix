<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    function showProducts(){
        return view('admin.products');
    }
    function showUsers(){
        return view('admin.users');
    }
    function showadmProfile($id){
        $user = User::find($id);
        return view('admin.admprofile', ["data" => $user]);
    }
}
