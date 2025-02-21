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
        $user = User::find(session('user_id')); 
        $offer = Offer::where('product_id', $id)
        ->where('user_id', $user->id)
        // ->where('status', 'pending')
        ->first();
        return view('User.product-details', compact('product', 'user', 'offer'));
    }

    function search(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('desc', 'LIKE', "%{$query}%")
                        ->get();

    return view('User.products', compact('products'));
}

} 