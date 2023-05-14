<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->group(function () {
  // Login
  Route::get('login', [CustomerController::class, 'login'])->name('home.login');
  Route::post('login', [CustomerController::class, 'store_login'])->name('home.store_login');
  // Register
  Route::get('register', [CustomerController::class, 'register'])->name('home.register');
  Route::post('register', [CustomerController::class, 'store_register'])->name('home.store_register');
  // Logout
  Route::get('logout', [CustomerController::class, 'logout'])->name('home.logout');

  Route::get('/info', [HomeController::class, 'info'])->name('home.info')->middleware('customer', 'checkbanned');
  Route::post('/info', [HomeController::class, 'store_info'])->name('home.store_info')->middleware('customer', 'checkbanned');

  Route::get('/my-order/{id?}', [HomeController::class, 'my_order'])->name('home.my_order')->middleware('customer', 'checkbanned');
});
