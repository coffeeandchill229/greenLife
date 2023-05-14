<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->middleware('auth')->group(function () {
  Route::get('/', [ProductController::class, 'index'])->name('admin.product');
  Route::get('addOrUpdate/{id?}', [ProductController::class, 'addOrUpdate'])->name('admin.product.addOrUpdate');
  Route::post('store/{id?}', [ProductController::class, 'store'])->name('admin.product.store');
  Route::get('delete/{id?}', [ProductController::class, 'delete'])->name('admin.product.delete');
});
