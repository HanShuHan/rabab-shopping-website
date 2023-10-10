<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//HOME/INDEX
Route::get('/', [NavigationController::class, 'index']);

Route::get('/comp', function() {
    return view('pages.index');
});
//LOGIN AND REGISTER
Route::get('/login', function() {
    return view('pages.login');
});

Route::get('/signup', function() {
    return view('pages.register');
});

//USER CONTROLLER
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/auth', [UserController::class, 'login']);

//PRODUCT CONTROLLER
Route::get('/product/{product_id}', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

//CART CONTROLLER
Route::post('/cart/remove/{item_id}', [\App\Http\Controllers\CartController::class, 'removeFromCart']);
Route::post('/cart/add/{product_id}', [\App\Http\Controllers\ProductController::class, 'addToCart']);
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'showCart']);
Route::post('/cart/clear', [\App\Http\Controllers\CartController::class, 'clearCart']);


