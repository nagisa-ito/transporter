<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Section;

class SectionController extends Controller
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
     * @param  boolean  $id
     * @return \Illuminate\Http\Response
     */
    public function index($is_regular)
    {
        $sections = Section::where([
            'user_id' => Auth::id(),
            'is_delete' => false,
            'is_regular' => $is_regular,
        ])->get();

        // 定期一覧の表示
        if ($is_regular) {
            return view('sections.index_regular', compact('sections', 'is_regular'));
        }

        // 登録区間一覧の表示
        return view('sections.index_favorite', compact('sections', 'is_regular'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($is_regular)
    {
        return view('sections.create', compact('is_regular'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = ($request->is_regular) ? '定期' : 'お気に入り区間';
        $validation = Section::validator($request->all());

        try {
            if ($validation->fails()) {
                return redirect('sections/create')->withErrors($validation)->withInput();
            }

            $section = new Section();
            $section->fill($request->all())->save();
        } catch (Exception $e) {
            return redirect('sections/create')->with([
                'status' => "{$type}の追加に失敗しました。",
                'class' => 'notification is-danger'
            ]);
        }

        return redirect("sections/{$section->is_regular}")->with([
            'status' => "{$type}の追加に成功しました。",
            'class' => 'notification is-primary'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
        return view('sections.edit', ['section' => $section, 'is_regular' => $section->is_regular]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = ($request->is_regular) ? '定期' : 'お気に入り区間';
        $validation = Section::validator($request->all());

        try {
            if ($validation->fails()) {
                return redirect('sections/edit')->withErrors($validation)->withInput();
            }

            $section = Section::find($id);
            $section->fill($request->all())->save();
        } catch (Exception $e) {
            return redirect('sections/edit')->with([
                'status' => "{$type}の更新に失敗しました。",
                'class' => 'notification is-danger'
            ]);
        }

        return redirect("sections/{$section->is_regular}")->with([
            'status' => "{$type}の更新に成功しました。",
            'class' => 'notification is-primary'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $section = Section::find($id);
            $type = ($section->is_regular) ? '定期' : 'お気に入り区間';
            $section->is_delete = true;
            $section->save();
        } catch (Exception $e) {
            return redirect('sections')->with([
                'status' => "{$type}の削除に失敗しました。",
                'class' => 'notification is-danger'
            ]);
        }

        return redirect("sections/{$section->is_regular}")->with([
            'status' => "{$type}の削除に成功しました。",
            'class' => 'notification is-primary'
        ]);
    }
}
