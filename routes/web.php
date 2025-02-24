<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\UserAuthMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProductController;

Route::get('/', [AuthController::class, 'ShowLogin'])->name('login');
Route::post('LoginUser', [AuthController::class, 'LoginUser'])->name('LoginUser');

Route::get('/signup', [AuthController::class, 'ShowSignup'])->name('signup');
Route::post('RegisterUser', [AuthController::class, 'RegisterUser'])->name('RegisterUser');

Route::get('LogoutUser', [AuthController::class, 'LogoutUser'])->name('logout');

// User routes with user.auth middleware
Route::middleware([UserAuthMiddleware::class])->group(function () {
    Route::get('/userdash', [AuthController::class, 'ShowUserDash'])->name('userdash');

    Route::controller(UserController::class)->group(function () {
        Route::get('/products', 'showProduct')->name('userproducts');
        Route::get('/add-product', 'addProduct')->name('addProduct');
        Route::post('/store-product', 'storeProduct')->name('storeProduct');
        Route::get('/my-products', 'myProducts')->name('myproducts');
        Route::get('/profile/{id}', 'showProfile')->name('profile');
        Route::put('/profile/{id}', 'updateProfile')->name('updateProfile');
        Route::get('/cart', 'showCart')->name('cart');
        Route::put('/update-product/{id}', 'updateProduct')->name('updateProduct');
        Route::delete('/delete-product/{id}', 'deleteProduct')->name('deleteProduct');
        Route::post('/add-to-cart/{id}', 'addToCart')->name('addToCart');
        Route::delete('/remove-from-cart/{id}', 'removeFromCart')->name('removeFromCart');
    });

    Route::controller(OfferController::class)->group(function (){
        Route::post('/store-offer', 'store')->name('storeOffer');
        Route::get('/offer', 'showOffer')->name('offer');
        Route::get('/message', 'showMessage')->name('message');
        Route::get('/accept/{id}', 'Accept')->name('accept');
        Route::get('/reject/{id}', 'Reject')->name('reject');
        Route::get('/deleteoffer/{id}', 'DeleteOffer')->name('deleteOffer');

    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product/{id}','show')->name('product.details');
        Route::get('/search','search')->name('search');

    });
   
});

// Admin routes with admin middleware
Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/admdash', [AuthController::class, 'ShowAdminDash'])->name('admdash');
    
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admprofile/{id}', 'showadmProfile')->name('admprofile');
        Route::put('/admprofile/{id}', 'updateProfile')->name('upadmprofile');
        Route::get('/admin-products', 'showProducts')->name('admproducts');
        Route::delete('/deleteProduct/{id}', 'DeleteProduct')->name('DeleteProduct');
        Route::get('/users', 'showUsers')->name('admuser');
        Route::delete('deleteUser/{id}', 'deleteUser')->name('deleteUser');
        Route::get('FreezeUser/{id}', 'FreezeUser')->name('FreezeUser');
        Route::get('UnfreezeUser/{id}', 'UnfreezeUser')->name('UnfreezeUser');
    });
});
