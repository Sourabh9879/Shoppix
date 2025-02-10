<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\UserAuthMiddleware;
use App\Http\Middleware\AdminMiddleware;

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
        Route::get('/edit-product/{id}', 'editProduct')->name('editProduct');
        Route::put('/update-product/{id}', 'updateProduct')->name('updateProduct');
        Route::delete('/delete-product/{id}', 'deleteProduct')->name('deleteProduct');
        Route::get('/view-product/{id}', 'viewProduct')->name('viewProduct');
        Route::post('/add-to-cart/{id}', 'addToCart')->name('addToCart');
        Route::delete('/remove-from-cart/{id}', 'removeFromCart')->name('removeFromCart');
    });
});

// Admin routes with admin middleware
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admdash', [AuthController::class, 'ShowAdminDash'])->name('admdash');

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin-products', 'showProducts')->name('admproducts');
        Route::get('/users', 'showUsers')->name('admuser');
    });
});