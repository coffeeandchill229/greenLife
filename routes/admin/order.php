<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->middleware('auth')->group(function () {
  Route::get('/', [OrderController::class, 'index'])->name('admin.order');
  Route::get('/detail/{id?}', [OrderController::class, 'detail'])->name('admin.order.detail');
  Route::get('/update/{id?}', [OrderController::class, 'update'])->name('admin.order.update');
  Route::post('/store/{id?}', [OrderController::class, 'store'])->name('admin.order.store');
  Route::get('/delete/{id?}', [OrderController::class, 'delete'])->name('admin.order.delete');
  Route::get('/print/{id?}', [OrderController::class, 'print_order'])->name('admin.order.print');
});
