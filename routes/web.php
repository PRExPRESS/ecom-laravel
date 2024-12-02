<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/shop',[ProductController::class, 'index'] )->name('shop');
Route::get('/shop-search',[ProductController::class, 'search'] )->name('search');
Route::get('/shop-filter',[ProductController::class, 'filters'] )->name('shop.filter');

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/product/{slug}', [ProductController::class, 'product'])->name('product');

Route::get('/view-cart', function () {
    return view('view-cart');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
})->name('login');



Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [AuthController::class, 'index'])->name('my-account');
    Route::put('/update-profile', [AuthController::class, 'update'])->name('update-profile');
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');
    Route::post('/review', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.create');
    
});

Route::get('/review', [ReviewController::class, 'index'])->name('review');

Route::post('/login',[AuthController::class, 'login'])->name('user.login');
Route::post('/register',[AuthController::class, 'register'])->name('user.register');
Route::get('/logout',[AuthController::class, 'logout'])->name('user.logout');


Route::post('/add-to-cart',[CartController::class, 'addToCart'])->name('cart.add');
Route::get('/get-cart-count',[CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/get-cart-items',[CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/cart-update',[CartController::class, 'update'])->name('cart.update');



