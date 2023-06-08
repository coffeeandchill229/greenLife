<?php

use App\Http\Controllers\OrderStatusController;
use Illuminate\Support\Facades\Route;

Route::prefix('order-status')->middleware('auth')->group(function () {
  Route::get('/{id?}', [OrderStatusController::class, 'index'])->name('admin.order_status');
  Route::post('/store/{id?}', [OrderStatusController::class, 'store'])->name('admin.order_status.store');
});
