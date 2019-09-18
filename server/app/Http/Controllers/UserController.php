<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

// TIPS: このコントローラーで使用したいモデルがあれば随時追加をしていく
use App\Models\User;
use App\Models\Department;

class UserController extends Controller
{
    /**
     * ログインしていない場合はログインページへ移動させる
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function edit()
    {
        $departments = Department::all();
        $departments = $departments->pluck('name', 'id');

        $user = Auth::user();
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
        try {
            $user = user::find($request->id);
            $user->fill($request->all())->save();
            $user->save();
        } catch (Exception $e) {
            return redirect('profile/edit')->with([
                'status' => 'プロフィールの編集に失敗しました。',
                'class' => 'notification is-danger'
            ]);
        }

        return redirect('profile/edit')->with([
            'status' => 'プロフィールの編集に成功しました。',
            'class' => 'notification is-primary'
        ]);
    }
}
