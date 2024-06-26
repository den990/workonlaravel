<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DeleteController')->name('post.delete');
    Route::post('/posts', 'StoreController')->name('post.store');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::group(['namespace' => 'Post'], function (){
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });

});

Auth::routes();

Route::get('/main', 'MainController@index')->name('main');
