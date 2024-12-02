<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin,editor']], function () {
    Route::get('/', function () {

        //products count
        $products = Product::all();
        $productsCount = $products->count();

        //users count
        $users = User::all();
        $usersCount = $users->count();

        //orders count
        $orders = Order::all();
        $ordersCount = $orders->count();

        return view('admin.dashboard', compact('productsCount', 'usersCount', 'ordersCount'));
    })->name('admin.dashboard');

    Route::get('/users', [AuthController::class, 'viewUsers'])->name('admin.users');
    Route::get('/users/create', function () {
        return view('admin.create-user');
    });
    Route::get('/users/{id}', [AuthController::class, 'viewUser'])->name('admin.users.view');
    Route::post('/users/create', [AuthController::class, 'store'])->name('admin.users.create');
    Route::put('/users/{id}', [AuthController::class, 'updateUser'])->name('admin.users.update');
    //Route::delete('/users/{id}', [AuthController::class, 'deleteUser'])->name('admin.users.delete');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/categories/create', function () {
        return view('admin.create-category');
    });
    Route::post('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

    Route::get('/brands', function () {
        return view('admin.brands');
    });
    Route::get('/brands/create', function () {
        return view('admin.create-brand');
    });
    Route::get('/products', [ProductController::class, 'adminProduct'])->name('admin.products.index');
    Route::get('/products/create', function () {
        return view('admin.create-prodcut');
    });
    Route::post('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');

    Route::get('/orders', [CartController::class, 'orders'])->name('admin.orders');
    Route::delete('/orders/{id}', [CartController::class, 'deleteOrder'])->name('admin.orders.delete');

    
    Route::get('/logout',[AuthController::class, 'logout'])->name('user.logout');
});
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::post('/admin/login',[AuthController::class, 'login'])->name('user.login');



