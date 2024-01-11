<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThemeSettingController;
use Illuminate\Support\Facades\Route;
// Client
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Home
    Route::group([], __DIR__ . '/client/home.php');
    // Cart
    Route::group([], __DIR__ . '/client/cart.php');
    // Customer
    Route::group([], __DIR__ . '/client/customer.php');
});
// Admin
Route::prefix('admin')->group(function () {
    // Login
    Route::group([], __DIR__ . '/admin/admin.php');
    // Products
    Route::group([], __DIR__ . '/admin/product.php');
    // Categories
    Route::group([], __DIR__ . '/admin/category.php');
    // Customers
    Route::group([], __DIR__ . '/admin/customer.php');
    // Users
    Route::group([], __DIR__ . '/admin/user.php');
    // Orders
    Route::group([], __DIR__ . '/admin/order.php');
    // Order - Status
    Route::group([], __DIR__ . '/admin/order_status.php');
    // Order - Detail
    Route::group([], __DIR__ . '/admin/order_detail.php');
    // Banner
    Route::group([], __DIR__ . '/admin/banner.php');
    // Posts
    Route::group([], __DIR__ . '/admin/post.php');
    // Comments
    Route::group([], __DIR__ . '/admin/comment.php');
    // Setting store
    Route::post('store_theme_setting', [ThemeSettingController::class, 'store'])->name('admin.store_theme_setting');
});