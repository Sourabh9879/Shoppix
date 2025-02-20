<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->name = $request->input('name');
        $offer->user_id = $request->input('user_id');
        $offer->phone = $request->input('phone');
        $offer->email = $request->input('email');
        $offer->amount = $request->input('amount');
        $offer->message = $request->input('message');
        $offer->seller_name = $request->input('seller_name');
        $offer->seller_id = $request->input('seller_id');
        $offer->product_id = $request->input('product_id');
        $offer->status = 'pending';
        $offer->save();

        return redirect()->back()->with('success', 'Offer sent successfully!');
    }
}
