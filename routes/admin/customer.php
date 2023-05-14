<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('customers')->middleware('auth')->group(function () {
  Route::get('{id?}', [CustomerController::class, 'index'])->name('admin.customer');
  Route::get('edit/{id?}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
  Route::post('store/{id?}', [CustomerController::class, 'store'])->name('admin.customer.store');
  Route::get('delete/{id?}', [CustomerController::class, 'delete'])->name('admin.customer.delete');
});
