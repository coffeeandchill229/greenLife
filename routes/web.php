<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThemeSettingController;
use Illuminate\Support\Facades\Route;

// Client
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Home
    include('client/home.php');
    // Cart
    include('client/cart.php');
    // Customer
    include('client/customer.php');
});
// Admin
Route::prefix('admin')->group(function () {
    // Login
    include('admin/admin.php');
    // Products
    include('admin/product.php');
    // Categories
    include('admin/category.php');
    // Customers
    include('admin/customer.php');
    // Users
    include('admin/user.php');
    // Orders
    include('admin/order.php');
    // Order - Status
    include('admin/order_status.php');
    // Order - Detail
    include('admin/order_detail.php');
    // Banner
    include('admin/banner.php');
    // Posts
    include('admin/post.php');
    // Setting store
    Route::post('store_theme_setting', [ThemeSettingController::class, 'store'])->name('admin.store_theme_setting');
});
