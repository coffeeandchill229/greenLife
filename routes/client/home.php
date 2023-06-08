<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

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
// About
Route::get('about', [HomeController::class, 'about'])->name('about');
// Contact
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'store_contact'])->name('home.store_contact');
// News
Route::get('new', [HomeController::class, 'new'])->name('new');
Route::get('new_detail/{id?}', [HomeController::class, 'new_detail'])->name('new_detail');
// Comments
Route::post('/comment/{post_id?}/{customer_id?}', [CommentController::class, 'store'])->name('home.store_comment')->middleware('auth');
Route::get('/delete-comment/{id?}', [CommentController::class, 'delete'])->name('home.comment.delete');
// Reply - comment
Route::post('/reply-comment/{comment_id?}/{customer_id?}', [ReplyController::class, 'store'])->name('home.store_reply_comment')->middleware('auth');
Route::get('/delete-reply-comment/{id?}', [ReplyController::class, 'delete'])->name('home.reply_comment.delete');
