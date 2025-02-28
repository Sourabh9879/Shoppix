<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\Report;

class UserController extends Controller
{
    function showProduct(){
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('user.products', compact('products'));
    }
    function addProduct(){
        return view('user.addProduct');
    }
    
    function showProfile($id){
        $user = User::find($id);
        return view('user.profile', ["data" => $user]);
    }

    function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'phone' => 'sometimes|integer',
            'address' => 'sometimes|string|max:255',
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
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }
        if ($request->has('address')) {
            $user->address = $request->address;
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

    function showCart(){
        $cartItems = Cart::where('user_id', session('user_id'))->get();
        return view('user.cart', compact('cartItems'));
    }

    function myProducts(){
        $products = Product::where('user_id', session('user_id'))->get();
        return view('user.myproducts', compact('products'));
    }

    function storeProduct(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'category' => 'required|string|max:20',
                'price' => 'required|numeric|min:1|max:99999999',
                'desc' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3000',
            ]);

            if (!$request->hasFile('image')) {
                return redirect()->back()->with('error', 'No image file uploaded');
            }

            $file = $request->file('image');
            if (!$file->isValid()) {
                return redirect()->back()->with('error', 'Invalid image file');
            }

            $path = $request->file('image')->store('product_images', 'public');
            
            Product::create([
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price,
                'desc' => $request->desc,
                'image' => $path,
                'user_id' => session('user_id'),
                'user_name' => session('name'),
            ]);

            return redirect()->route('myproducts')->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    function deleteProduct($id){
        $product = Product::find($id);
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('myproducts')->with('success', 'Product deleted successfully');

    }

    function updateProduct(Request $request, $id){
        $request->validate([
            'name' => 'sometimes|string|max:50',
            'category' => 'sometimes|string|max:20',
            'price' => 'sometimes|numeric',
            'desc' => 'sometimes|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:3000',
        ]);

        $product = Product::find($id);
        if ($request->has('name')) {
            $product->name = $request->name;
        }
        if ($request->has('category')) {
            $product->category = $request->category;
        }
        if ($request->has('price')) {
            $product->price = $request->price;
        }
        if ($request->has('desc')) {
            $product->desc = $request->desc;
        }
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $path = $request->file('image')->store('product_images', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('myproducts')->with('success', 'Product updated successfully');
    }

    function addToCart($id){
        $product = Product::find($id);
        $cartItem = Cart::where('user_id',session('user_id'))->where('product_id', $product->id)->first();

        if ($cartItem) {
            return redirect()->route('cart')->with('info', 'Product is already in your cart.');
        }

        Cart::create([
            'user_id' => session('user_id'),
            'product_id' => $product->id,
        ]);
        return redirect()->route('cart')->with('success', 'Product added to wishlist successfully');
    }
    function removeFromCart($id){
        $cartItem = Cart::find($id);
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Product removed from wishlist successfully');
    }

    public function reportUser(Request $request, $id)
    {
        $reporterId = session('user_id');
        $reportedId = $id;
        $report_message = $request->message;

        $existingReport = Report::where('reporter_id', $reporterId)
                                ->where('reported_id', $reportedId)
                                ->first();

        if ($existingReport) {
            return redirect()->back()->with('failed', 'You have already reported this user.');
        }

        $request->validate([
            'message' => 'required|string|max:255',
        ],[
            'message.required' => 'Please provide a message for the report',
        ]); 

        Report::create([
            'reporter_id' => $reporterId,
            'reported_id' => $reportedId,
            'report_message' => $report_message,
        ]);

        return redirect()->back()->with('success', 'User reported successfully.');
    }

  

}
