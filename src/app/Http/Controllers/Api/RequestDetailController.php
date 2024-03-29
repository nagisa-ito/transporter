<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


// TIPS: このコントローラーで使用したいモデルがあれば随時追加をしていく
use App\Models\RequestDetail;

class RequestDetailController extends Controller
{
    /**
     * 一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // user_idを持ってくる adminユーザーは別の処理が必要
        // TODO: yyyymmの指定もここでする
        \Log::info(Auth::user());
        $user_id = Auth::id();
        $request_details = RequestDetail::where('user_id', $user_id)->get();
        return $request_details;
    }

    /**
     * 月ごとの一覧表示
     * 
     * @return \Illuminate\Http\Response
     */
    public function monthly_requests()
    {
        return 'monthly_requests';
    }

    /**
     * 追加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_detail = new RequestDetail;
        $request_detail->name              = $request->name;
        $request_detail->user_id           = $request->user_id;
        $request_detail->date              = $request->date;
        $request_detail->type              = $request->type;
        $request_detail->transportation_id = $request->transportation_id;
        $request_detail->is_oneway         = $request->is_oneway;
        $request_detail->from              = $request->from;
        $request_detail->to                = $request->to;
        $request_detail->cost              = $request->cost;
        $request_detail->overview          = $request->overview;
        $request_detail->save();
        return redirect('api/request_details');
    }

    /**
     * 指定したidの申請を表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request_detail = RequestDetail::find($id);
        return $request_detail;
    }

    /**
     * 更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_detail = RequestDetail::find($id);
        $request_detail->name              = $request->name;
        $request_detail->user_id           = $request->user_id;
        $request_detail->date              = $request->date;
        $request_detail->is_delete         = $request->is_delete;
        $request_detail->type              = $request->type;
        $request_detail->transportation_id = $request->transportation_id;
        $request_detail->is_oneway         = $request->is_oneway;
        $request_detail->from              = $request->from;
        $request_detail->to                = $request->to;
        $request_detail->cost              = $request->cost;
        $request_detail->overview          = $request->overview;
        $article->save();
        // TODO: 論理削除した時は一覧ページにリダイレクト
        return redirect("api/request_details/{$id}");
    }

    /**
     * 物理削除
     * 実際はupdate()のis_deleteで論理削除するのでdestroy()は便宜上存在するが使用しない
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request_detail = RequestDetail::find($id);
        $request_detail->delete();
        return redirect('api/articles');
    }
}
