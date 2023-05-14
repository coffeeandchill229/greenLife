<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')->middleware('auth')->group(function () {
  Route::get('/', [PostController::class, 'index'])->name('admin.post');
  Route::get('addOrUpdate/{id?}', [PostController::class, 'addOrUpdate'])->name('admin.post.addOrUpdate');
  Route::post('add/{id?}', [PostController::class, 'store'])->name('admin.post.store');
});
