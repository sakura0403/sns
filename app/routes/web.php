<?php

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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

// Route::get('/', 'DisplayController@index');

Route::resource('posts', 'PostController');
Route::resource('likes', 'LikeController');
Route::resource('comments', 'CommentController');
Route::resource('violations', 'ViolationController');
