<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// TIPS: このコントローラーで使用したいモデルがあれば随時追加をしていく
use App\Models\VMonthlyRequest;

class VMonthlyRequestsController extends Controller
{
    /**
     * 月ごとの申請一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: 特定のユーザーの一覧表示をするようにする
        // セッション？認証情報からuser_idを持ってくる adminユーザーは別の処理が必要
        // 一年分の申請を表示？
        // 2018-01とかの指定あったら別の処理にするか それかvueでpaginateする
        $user_id = 2;
        $monthly_requests = VMonthlyRequest::where('user_id', $user_id)->get();
        return $monthly_requests;
    }
}
