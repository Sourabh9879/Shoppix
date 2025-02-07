<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\UserAuthMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\http\Controllers\UserController;
use App\http\Controllers\AdminController;

Route::get('/', [AuthController::class,'ShowLogin'])->name('login');
Route::post('LoginUser', [AuthController::class,'LoginUser'])->name('LoginUser');

Route::get('/signup', [AuthController::class,'ShowSignup'])->name('signup');
Route::post('RegisterUser', [AuthController::class,'RegisterUser'])->name('RegisterUser');

Route::get('LogoutUser', [AuthController::class,'LogoutUser'])->name('logout');

// user routes
Route::middleware([UserAuthMiddleware::class])->group(function(){
    Route::get('/userdash', [AuthController::class,'ShowUserDash'])->name('userdash');
    
Route::controller(UserController::class)->group(function(){
    Route::get('/products','showProduct')->name('userproducts');
    Route::get('/add-product','addProduct')->name('addProduct');
    Route::get('/my-products','myProducts')->name('myproducts');
    Route::get('/profile','showProfile')->name('profile');
    Route::get('/cart','showCart')->name('cart');
    });
});


// admin routes
Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admdash', [AuthController::class,'ShowAdminDash'])->name('admdash');

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin-products','showProducts')->name('admproducts');
    Route::get('/users','showUsers')->name('admuser');
    });
});