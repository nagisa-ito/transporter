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

// TODO: adminユーザーと一般ユーザーでルーティングファイルを分ける

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['api']], function () {
//     // APIにはcreate, editの処理は不要なので削除する
//     Route::resource('users', 'Api\UsersController', ['except' => ['create', 'edit']]);

    // TIPS: Route::resourceが優先されるのでRoute::getなどは反映されない
    // Route::get('request_details', 'Api\RequestDetailController@index');
    // Route::get('request_details/{request_detail}', 'Api\RequestDetailController@show');
    // Route::post('request_details', 'Api\RequestDetailController@store');
    // Route::put('request_details', 'Api\RequestDetailController@update');
    // Route::get('request_details/monthly_requests', 'Api\RequestDetailController@monthly_requests');

//     Route::resource('sections', 'Api\SectionsController', ['except' => ['create', 'edit']]);

//     Route::resource('confirm_months', 'Api\ConfirmMonthsController', ['only' => ['store', 'destroy']]);

//     Route::get('monthly_requests', 'Api\VMonthlyRequestsController@index');
// });
