<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $user = User::find(session('user_id')); // Get current user data
        return view('User.product-details', compact('product', 'user'));
    }

} 