<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('comments')->middleware('auth')->group(function () {
  Route::get('/', [CommentController::class, 'index'])->name('admin.comment');
  Route::get('/delete/{id?}', [CommentController::class, 'delete'])->name('admin.comment.delete');
});