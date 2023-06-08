<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.login')->middleware('isAdmin');
// Logout
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Dashboard
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('isAdmin');
