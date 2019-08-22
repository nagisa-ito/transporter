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

// Route::get('/', function () {
//     return view('users/login');
// });

Route::get('/', 'UsersController@login');
