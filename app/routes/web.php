<?php

use App\Http\Controllers\DisplayController;

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


Auth::routes();
Route::get('/',[DisplayController::class, 'index']);

// Route::get('/', 'DisplayController@index');


// リソースコントローラーのルーティング記述
Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');
Route::resource('likes', 'LikeController');
Route::resource('comments', 'CommentController')->except([
    'create', 'store' // except=create,storeは除く  only=create,storeはのみ
]);
Route::resource('violations', 'ViolationController')->except([
    'create', 'store' // create,storeは除く
]);;


// ターミナルのURI,Name追加変更
Route::get('myposts/{post}', 'PostController@myshow')->name('myposts.show');
Route::post('posts/confilm', 'PostController@confilm')->name('posts.confilm');
Route::get('comments/create/{post}', 'CommentController@create')->name('comments.create');
Route::post('comments/store/{post}', 'CommentController@store')->name('comments.store');
Route::get('violations/create/{post}', 'ViolationController@create')->name('violations.create');
Route::post('violations/store/{post}', 'ViolationController@store')->name('violations.store');
Route::post('posts/search', 'PostController@search')->name('posts.search');

