<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// TIPS: このコントローラーで使用したいモデルがあれば随時追加をしていく
use App\Models\User;
use App\Models\Department;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $departments = $departments->pluck('name', 'id');

        $user = User::find($id);
        return view('users.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // TODO:
        // バリデーション、失敗時のフラッシュ
        // 直リンクでログインしなくてもページ移動できちゃう
        $user = user::find($request->id);
        $user->last_name     = $request->last_name;
        $user->first_name    = $request->first_name;
        $user->password      = Hash::make($request->password);
        $user->department_id = $request->department_id;
        $user->enable        = $request->enable;
        $user->save();

        return redirect("profile/edit/{$request->id}")->with('status', 'プロフィールの編集に成功しました。');
    }
}
