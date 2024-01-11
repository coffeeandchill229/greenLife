<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->middleware(['isAdmin'])->group(function () {
  Route::get('/', [UserController::class, 'index'])->name('admin.user');
  Route::get('addOrUpdate/{id?}', [UserController::class, 'addOrUpdate'])->name('admin.user.addOrUpdate');
  Route::post('store/{id?}', [UserController::class, 'store'])->name('admin.user.store');
  Route::get('delete/{id?}', [UserController::class, 'delete'])->name('admin.user.delete');
  Route::get('info', [UserController::class, 'info'])->name('admin.user.info');
});
