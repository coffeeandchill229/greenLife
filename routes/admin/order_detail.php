<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('order-detail')->middleware('auth')->group(function () {
  Route::get('/delete/{id?}', [OrderController::class, 'order_detail_delete'])->name('admin.order_detail.delete');
});
