<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThemeSettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Client
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Product
    Route::prefix('products')->group(function (){
        Route::get('/detail/{id?}',[HomeController::class, 'product_detail'])->name('home.product_detail');
    });
    // Cart
    Route::prefix('cart')->group(function () {
        // Cart - Page
        Route::get('/', [HomeController::class, 'cart'])->name('home.cart')->middleware('customer');
        // Checkout - Page
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout')->middleware('customer');
        Route::post('/checkout', [HomeController::class, 'store_checkout'])->name('home.store_checkout');
        // Crud
        Route::get('/add/{id?}', [CartController::class, 'add'])->name('cart.add')->middleware('customer');
        Route::post('/update', [CartController::class, 'update'])->name('cart.update')->middleware('customer');
        Route::get('/delete/{id?}', [CartController::class, 'delete'])->name('cart.delete')->middleware('customer');
        Route::get('/remove', [CartController::class, 'remove'])->name('cart.remove')->middleware('customer');
    });
    // Customer
    Route::prefix('customer')->group(function () {
        // Login
        Route::get('login', [CustomerController::class, 'login'])->name('home.login');
        Route::post('login', [CustomerController::class, 'store_login'])->name('home.store_login');
        // Register
        Route::get('register', [CustomerController::class, 'register'])->name('home.register');
        Route::post('register', [CustomerController::class, 'store_register'])->name('home.store_register');
        // Logout
        Route::get('logout', [CustomerController::class, 'logout'])->name('home.logout');
    });
    // About
    Route::get('about', [HomeController::class, 'about'])->name('about');
    // Contact
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
});
// Admin
Route::prefix('admin')->group(function () {
    // Login
    Route::get('/', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/', [AdminController::class, 'store_login'])->name('admin.store_login');
    // Register
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'store_register'])->name('admin.store_register');
    // Logout
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
    // Products
    Route::prefix('products')->middleware('auth')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product');
        Route::get('addOrUpdate/{id?}', [ProductController::class, 'addOrUpdate'])->name('admin.product.addOrUpdate');
        Route::post('store/{id?}', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('delete/{id?}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });
    // Categories
    Route::prefix('categories')->middleware('auth')->group(function () {
        Route::get('{id?}', [CategoryController::class, 'index'])->name('admin.category');
        Route::post('store/{id?}', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('delete/{id?}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });
    // Customers
    Route::prefix('customers')->middleware('auth')->group(function () {
        Route::get('{id?}', [CustomerController::class, 'index'])->name('admin.customer');
        Route::post('store/{id?}', [CustomerController::class, 'store'])->name('admin.customer.store');
        Route::get('delete/{id?}', [CustomerController::class, 'delete'])->name('admin.customer.delete');
    });
    // Customers
    Route::prefix('users')->middleware('auth')->group(function () {
        Route::get('{id?}', [UserController::class, 'index'])->name('admin.user');
        Route::post('store/{id?}', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('delete/{id?}', [UserController::class, 'delete'])->name('admin.user.delete');
    });
    // Orders
    Route::prefix('orders')->middleware('auth')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.order');
        Route::get('/detail/{id?}', [OrderController::class, 'detail'])->name('admin.order.detail');
        Route::get('/update/{id?}', [OrderController::class, 'update'])->name('admin.order.update');
        Route::post('/store/{id?}', [OrderController::class, 'store'])->name('admin.order.store');
        Route::get('/delete/{id?}', [OrderController::class, 'delete'])->name('admin.order.delete');
    });
    // Order - Status
    Route::prefix('order-status')->middleware('auth')->group(function () {
        Route::get('/', [OrderStatusController::class, 'index'])->name('admin.order_status');
        Route::post('/store', [OrderStatusController::class, 'store'])->name('admin.order_status.store');
    });
    // Order - Detail
    Route::prefix('order-detail')->middleware('auth')->group(function () {
        Route::get('/delete/{id?}', [OrderController::class, 'order_detail_delete'])->name('admin.order_detail.delete');
    });
    // Setting store
    Route::post('store_theme_setting', [ThemeSettingController::class, 'store'])->name('admin.store_theme_setting');
});
