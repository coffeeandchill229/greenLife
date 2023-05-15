<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.login');
Route::post('/', [AdminController::class, 'store_login'])->name('admin.store_login');
// Register
Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/register', [AdminController::class, 'store_register'])->name('admin.store_register');
// Logout
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Dashboard
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
