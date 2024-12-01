<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/shop',[ProductController::class, 'index'] )->name('shop');

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/product/{slug}', function () {
    return view('product');

});
Route::get('/view-cart', function () {
    return view('view-cart');
});

Route::post('/add-to-cart',[CartController::class, 'addToCart'])->name('cart.add');
Route::get('/get-cart-count',[CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/get-cart-items',[CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/cart-update',[CartController::class, 'update'])->name('cart.update');

