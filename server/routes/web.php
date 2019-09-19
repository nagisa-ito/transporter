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
| Webアプリケーションを作成する場合のルーティング
| APIの場合はapi.phpに記載
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

// 認証
Auth::routes();

// プロフィール確認、編集
Route::get('profile/index', 'UserController@index');
Route::get('profile/edit', 'UserController@edit');
Route::post('profile/update', 'UserController@update');
Route::get('profile/edit_password', 'UserController@edit_password');
Route::post('profile/update_password', 'UserController@update_password');

