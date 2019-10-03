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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::where([
            'user_id' => Auth::id(),
            'is_delete' => false,
        ])->get();
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Section::validator($request->all());

        try {
            if ($validation->fails()) {
                return redirect('sections/create')->withErrors($validation)->withInput();
            }

            $Section = new Section();
            $Section->fill($request->all())->save();
        } catch (Exception $e) {
            return redirect('sections/create')->with([
                'status' => '定期の追加に失敗しました。',
                'class' => 'notification is-danger'
            ]);
        }

        return redirect('sections')->with([
            'status' => '定期の追加に成功しました。',
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
        return view('sections.edit', ['section' => $section]);
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
        $validation = Section::validator($request->all());

        try {
            if ($validation->fails()) {
                return redirect('sections/edit')->withErrors($validation)->withInput();
            }

            $section = Section::find($id);
            $section->fill($request->all())->save();
        } catch (Exception $e) {
            return redirect('sections/edit')->with([
                'status' => '定期の更新に失敗しました。',
                'class' => 'notification is-danger'
            ]);
        }

        return redirect('sections')->with([
            'status' => '定期の更新に成功しました。',
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
            $section->is_delete = true;
            $section->save();
        } catch (Exception $e) {
            return redirect('sections')->with([
                'status' => '定期の削除に失敗しました。',
                'class' => 'notification is-danger'
            ]);
        }

        return redirect('sections')->with([
            'status' => '定期の削除に成功しました。',
            'class' => 'notification is-primary'
        ]);
    }
}
