<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class,'ShowLogin'])->name('login');
Route::post('LoginUser', [AuthController::class,'LoginUser'])->name('LoginUser');

Route::get('/signup', [AuthController::class,'ShowSignup'])->name('signup');
Route::post('RegisterUser', [AuthController::class,'RegisterUser'])->name('RegisterUser');

Route::get('LogoutUser', [AuthController::class,'LogoutUser'])->name('logout');

// this route will return admin dashboard view
Route::get('/admdash', [AuthController::class,'ShowAdminDash'])->name('admdash');

// this route will return user dashboard view
Route::get('/userdash', [AuthController::class,'ShowUserDash'])->name('userdash');

Route::get('/products', function () {
    return view('User.products');
})->name('products');

Route::get('/add-product', function () {
    return view('User.addProduct');
})->name('addProduct');

Route::get('/profile', function () {
    return view('User.profile');
})->name('profile');
Route::get('/cart', function () {
    return view('User.cart');
})->name('cart');

// admin routes

Route::get('/admin-products', function () {
    return view('Admin.products');
})->name('admproducts');

Route::get('/users', function () {
    return view('Admin.users');
})->name('admuser');

