<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->middleware('auth')->group(function () {
  Route::get('{id?}', [CategoryController::class, 'index'])->name('admin.category');
  Route::post('store/{id?}', [CategoryController::class, 'store'])->name('admin.category.store');
  Route::get('delete/{id?}', [CategoryController::class, 'delete'])->name('admin.category.delete');
});
