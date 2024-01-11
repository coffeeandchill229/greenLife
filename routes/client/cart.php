<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('cart')->group(function () {
  // Cart - Page
  Route::get('/', [HomeController::class, 'cart'])->name('home.cart');
  // Checkout - Page
  Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout')->middleware('auth');
  Route::post('/checkout', [HomeController::class, 'store_checkout'])->name('home.store_checkout')->middleware('auth');
  Route::get('/check', [HomeController::class, 'check']);
  // Crud
  Route::get('/add/{id?}', [CartController::class, 'add'])->name('cart.add');
  Route::post('/update', [CartController::class, 'update'])->name('cart.update');
  Route::get('/delete/{id?}', [CartController::class, 'delete'])->name('cart.delete');
  Route::get('/remove', [CartController::class, 'remove'])->name('cart.remove');
});