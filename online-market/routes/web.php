<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

Auth::routes();

//Route::group(['namespace' => 'Home'], function () {
//    Route::get('/', [IndexController::class, '__invoke'])->name('home.index'); // Update route definition
//});
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/admin-panel', [AdminController::class, 'index'])->name('admin.index')->middleware(\App\Http\Middleware\AdminMiddleware::class);
Route::get('/admin-panel/create-product', [AdminController::class, 'createProduct'])->name('admin.create-product')->middleware(\App\Http\Middleware\AdminMiddleware::class);
Route::get('/admin-panel/products', [AdminController::class, 'products'])->name('admin.products')->middleware(\App\Http\Middleware\AdminMiddleware::class);
Route::get('/admin-panel/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit')->middleware(\App\Http\Middleware\AdminMiddleware::class);;
Route::put('/admin-panel/products/{id}', [ProductController::class, 'update'])->name('product.update')->middleware(\App\Http\Middleware\AdminMiddleware::class);;

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/{id}', [ProductController::class, 'view'])->name('product.view');
