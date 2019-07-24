<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| APIを作成する場合のルーティング
| Webアプリケーションを作成したい場合はweb.phpに記載
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function () {
    // APIにはcreate, editの処理は不要なので削除する
    Route::resource('users', 'Api\UsersController', ['except' => ['create', 'edit']]);
});
