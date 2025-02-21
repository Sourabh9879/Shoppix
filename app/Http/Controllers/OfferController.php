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
        $offer->offer_price = $request->input('offer_price');
        $offer->price = $request->input('price');
        $offer->message = $request->input('message');
        $offer->seller_name = $request->input('seller_name');
        $offer->seller_id = $request->input('seller_id');
        $offer->product_id = $request->input('product_id');
        $offer->product_image = $request->input('product_image');
        $offer->product_name = $request->input('product_name');
        $offer->status = 'pending';
        $offer->save();

        return redirect()->back()->with('success', 'Offer sent successfully!');
    }

    function showOffer()
    {
        $userId = session('user_id');
        
        $offers = Offer::where('offers.user_id', $userId)
                      ->join('products', 'offers.product_id', '=', 'products.id')
                      ->select('offers.*', 'products.name as product_name', 'products.image as product_image')
                      ->orderBy('offers.created_at', 'desc')
                      ->get();

        return view('User.offer', compact('offers'));
    }

    function showMessage(){
        $sellerId = session('user_id');

        $offers = Offer::where('offers.seller_id',$sellerId)
                      ->orderBy('offers.created_at', 'desc')
                      ->get();

                      
        return view('User.message', compact('offers'));
    }

    function Accept($id){

        Offer::where('product_id', $id)->update(['status' => 'accepted']);
        return redirect('message');

    }
    function Reject($id){

        Offer::where('product_id', $id)->update(['status' => 'rejected']);
        return redirect('message');

    }
    
}
