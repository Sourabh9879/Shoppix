<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $user = User::find(session('user_id')); // Get current user's data
        return view('User.product-details', compact('product', 'user'));
    }

    public function sendOffer(Request $request, $productId)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:500'
        ]);

        $product = Product::findOrFail($productId);
        
        // Create the offer
        $offer = Offer::create([
            'product_id' => $productId,
            'user_id' => session('user_id'),
            'amount' => $request->amount,
            'message' => $request->message
        ]);

        // Send notification to product owner (you can implement email notification here)
        // Example using mail:
        $productOwner = User::find($product->user_id);
        
        Mail::send('emails.new-offer', [
            'offer' => $offer,
            'product' => $product,
            'buyer' => User::find(session('user_id'))
        ], function($message) use ($productOwner) {
            $message->to($productOwner->email)
                    ->subject('New Offer Received');
        });

        return redirect()->back()->with('success', 'Offer sent successfully!');
    }
} 