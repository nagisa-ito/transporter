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
Route::get('/home', 'RequestDetailController@show')->name('home');

// 認証
Auth::routes();

// プロフィール確認、編集
Route::get('profile/index', 'UserController@index');
Route::get('profile/edit', 'UserController@edit');
Route::post('profile/update', 'UserController@update');
Route::get('profile/edit_password', 'UserController@edit_password');
Route::post('profile/update_password', 'UserController@update_password');

// 定期、お気に入り区間
Route::resource('sections', 'SectionController', ['only' => ['store', 'edit', 'update', 'destroy']]);
Route::get('sections/{is_regular}', 'SectionController@index');
Route::get('sections/create/{is_regular}', 'SectionController@create');

// 申請
Route::get('api/request_details', 'RequestDetailController@index');
Route::post('api/request_details/store', 'RequestDetailController@store');
