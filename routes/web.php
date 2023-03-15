<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function (){
    Route::get('/',[HomeController::class, 'index'])->name('home');
});

Route::prefix('admin')->group(function (){
    Route::get('/',[AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('products')->group(function (){
        Route::get('/',[ProductController::class, 'index'])->name('admin.product');
        Route::get('/add',[ProductController::class, 'add'])->name('admin.product.add');
        Route::post('/store/{id?}',[ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/delete/{id?}',[ProductController::class, 'delete'])->name('admin.product.delete');
    });
    Route::prefix('categories')->group(function (){
        Route::get('/',[CategoryController::class, 'index'])->name('admin.category');
        Route::post('/store',[CategoryController::class, 'store'])->name('admin.category.store');
    });

});