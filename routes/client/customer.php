<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->group(function () {
  // Login
  Route::get('login', [UserController::class, 'login'])->name('home.login');
  Route::post('login', [UserController::class, 'store_login'])->name('home.store_login');
  // Register
  Route::get('register', [UserController::class, 'register'])->name('home.register');
  Route::post('register', [UserController::class, 'store_register'])->name('home.store_register');
  // Logout
  Route::get('logout', [UserController::class, 'logout'])->name('home.logout');

  Route::get('/info', [HomeController::class, 'info'])->name('home.info')->middleware('auth', 'checkbanned');
  Route::post('/info', [HomeController::class, 'store_info'])->name('home.store_info')->middleware('auth', 'checkbanned');

  Route::get('/my-order/{id?}', [HomeController::class, 'my_order'])->name('home.my_order')->middleware('auth', 'checkbanned');
});
