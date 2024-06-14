<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;

Auth::routes();

//Route::group(['namespace' => 'Home'], function () {
//    Route::get('/', [IndexController::class, '__invoke'])->name('home.index'); // Update route definition
//});
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
