<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('banners')->middleware('auth')->group(function () {
  Route::get('/{id?}', [BannerController::class, 'index'])->name('admin.banner');
  Route::post('/store/{id?}', [BannerController::class, 'store'])->name('admin.banner.store');
  Route::get('/delete/{id?}', [BannerController::class, 'delete'])->name('admin.banner.delete');
});
