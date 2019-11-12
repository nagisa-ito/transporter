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
     */
    public function edit()
    {
        $departments = Department::all();
        $departments = $departments->pluck('name', 'id');

        $user = Auth::user();
        return view('users.edit', compact('user', 'departments'));
    }

    /**
     * Show the form for editing password the specified resource.
     */
    public function edit_password()
    {
        $user = Auth::user();
        return view('users.edit_password', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // 更新時バリデーション
        $validation = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                // update時に自分自身のemailはunique出ないことを許可する
                Rule::unique('users')->ignore(Auth::id()),
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
        ]);

        try {
            if ($validation->fails()) {
                return redirect('profile/edit')->withErrors($validation)->withInput();
            }
            $user = user::find($request->id);
            $user->fill($request->all())->save();
        } catch (Exception $e) {
            return redirect('profile/edit')->with([
                'status' => 'プロフィールの更新に失敗しました。',
                'class' => 'notification is-danger'
            ]);
        }

        return redirect('profile/edit')->with([
            'status' => 'プロフィールの更新に成功しました。',
            'class' => 'notification is-primary'
        ]);
    }

    /**
     * Update Password the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    {
        // 更新時バリデーション
        $validation = Validator::make($request->all(), [
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            if ($validation->fails()) {
                return redirect('profile/edit_password')->withErrors($validation)->withInput();
            }

            $user = Auth::user();
            $user->fill([
                'password' => Hash::make($request->password),
            ])->save();
        } catch (Exception $e) {
            return redirect('profile/edit_password')->with([
                'status' => 'パスワードの更新に失敗しました。',
                'class' => 'notification is-danger'
            ]);
        }

        // 成功時
        return redirect('profile/edit_password')->with([
            'status' => 'パスワードの更新に成功しました。',
            'class' => 'notification is-primary'
        ]);
    }
}
