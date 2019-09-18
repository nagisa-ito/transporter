<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            // 更新時バリデーション
            $validation = User::validator($request->all());
            if ($validation->fails()) {
                return redirect('profile/edit')
                    ->withErrors($validation)
                    ->withInput();
            }

            // TODO: パスワードの変更は分離したい その時は$request->all()で省略可能
            $user = user::find($request->id);
            $user->fill([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'department_id' => $request->department_id,
            ])->save();
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
