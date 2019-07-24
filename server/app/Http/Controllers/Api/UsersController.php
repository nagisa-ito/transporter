<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// TIPS: このコントローラーで使用したいモデルがあれば随時追加をしていく
use App\User;

class UsersController extends Controller
{
    /**
     * 一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 有効になっているユーザーのみ取得する
        // TODO: ユーザーの検索する場合どうするか、Vue側でやった方がいいかも
        $users = User::all();
        return $users;
    }

    /**
     * 新規作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->last_name     = $request->last_name;
        $user->first_name    = $request->first_name;
        $user->department_id = $request->department_id;
        $user->save();
        return redirect('api/users');
    }

    /**
     * 指定したidのユーザーを表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
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
        $user = user::find($id);
        $user->last_name     = $request->last_name;
        $user->first_name    = $request->first_name;
        $user->department_id = $request->department_id;
        $user->is_valid      = $request->is_valid;
        $user->department_id = $request->department_id;
        $user->is_admin      = $request->is_admin;
        $user->save();
        return redirect("api/users/{$id}");
    }

    /**
     * 物理削除
     * 実際はupdate()のis_validで論理削除するのでdestroy()は便宜上存在するが使用しない
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('api/users');
    }
}
