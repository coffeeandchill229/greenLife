<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThemeSettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Client
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Product
    Route::prefix('products')->group(function () {
        Route::get('/detail/{id?}', [HomeController::class, 'product_detail'])->name('home.product_detail');
    });
    // Product - Category
    Route::prefix('product-category')->group(function () {
        Route::get('{id?}', [HomeController::class, 'product_category'])->name('home.product_category');
    });
    // Search
    Route::get('search', [HomeController::class, 'search'])->name('home.search');
    // Cart
    include('client/cart.php');
    // Customer
    include('client/customer.php');

    // About
    Route::get('about', [HomeController::class, 'about'])->name('about');
    // Contact
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('contact', [HomeController::class, 'store_contact'])->name('home.store_contact');
    // News
    Route::get('new', [HomeController::class, 'new'])->name('new');
    Route::get('new_detail/{id?}', [HomeController::class, 'new_detail'])->name('new_detail');
    // Comments
    Route::post('/comment/{post_id?}/{customer_id?}', [CommentController::class, 'store'])->name('home.store_comment')->middleware('customer');
    Route::get('/delete-comment/{id?}', [CommentController::class, 'delete'])->name('home.comment.delete');
    // Reply - comment
    Route::post('/reply-comment/{comment_id?}/{customer_id?}', [ReplyController::class, 'store'])->name('home.store_reply_comment')->middleware('customer');
    Route::get('/delete-reply-comment/{id?}', [ReplyController::class, 'delete'])->name('home.reply_comment.delete');
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

Route::get('/namle', function () {
    $n = 10;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            if ($i == 1 || $i == $n || $j == 1 || $j == $i) {
                echo ' *';
            } else {
                echo str_repeat('&nbsp;', 2);
            }
        }
        echo '<br>';
    }
});
