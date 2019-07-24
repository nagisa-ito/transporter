<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// TIPS: このコントローラーで使用したいモデルがあれば随時追加をしていく
use App\ConfirmMonth;

class ConfirmMonthsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $confirm_month = new ConfirmMonth;
        $confirm_month->user_id = $request->user_id;
        $confirm_month->year_month = $request->year_month;
        $confirm_month->save();
        // TODO: 確定後のリダイレクト先
        return redirect('api/request_details');
    }

    /**
     * 削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $confirm_month = ConfirmMonth::find($id);
        $confirm_month->delete();
        // TODO: 確定後のリダイレクト先
        return redirect('api/request_details');
    }
}
