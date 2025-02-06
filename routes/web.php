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

// this route will return admin dashboard view
Route::get('/admdash', [AuthController::class,'ShowAdminDash'])->name('admdash');

// this route will return user dashboard view
Route::get('/userdash', [AuthController::class,'ShowUserDash'])->name('userdash')->middleware(UserAuthMiddleware::class);
Route::get('/products',[UserController::class,'showProduct'])->name('userproducts')->middleware(UserAuthMiddleware::class);
Route::get('/add-product',[UserController::class,'addProduct'])->name('addProduct')->middleware(UserAuthMiddleware::class);
Route::get('/profile',[UserController::class,'showProfile'])->name('profile')->middleware(UserAuthMiddleware::class);
Route::get('/cart',[UserController::class,'showCart'])->name('cart')->middleware(UserAuthMiddleware::class);

// admin routes
Route::get('/admin-products',[AdminController::class,'showProducts'])->name('admproducts')->middleware(AdminMiddleware::class);
Route::get('/users',[AdminController::class,'showUsers'])->name('admuser')->middleware(AdminMiddleware::class);

