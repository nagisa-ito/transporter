<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// TIPS: このコントローラーで使用したいモデルがあれば随時追加をしていく
use App\Models\Section;

class SectionsController extends Controller
{
    /**
     * 一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: 特定のユーザーの一覧表示をするようにする
        $sections = Section::all();
        return $sections;
    }

    /**
     * 追加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = new Section;
        $section->name       = $request->name;
        $section->user_id    = $request->user_id;
        $section->is_regular = $request->is_regular;
        $section->from       = $request->from;
        $section->to         = $request->to;
        $section->cost       = $request->cost;
        $section->save();
        return redirect('api/sections');
    }

    /**
     * 特定のidのSection表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        return $section;
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
        $section = Section::find($id);
        $section->name       = $request->name;
        $section->user_id    = $request->user_id;
        $section->is_delete  = $request->is_delete;
        $section->is_regular = $request->is_regular;
        $section->from       = $request->from;
        $section->to         = $request->to;
        $section->cost       = $request->cost;
        $section->save();
        return redirect("api/sections/{$id}");
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
        $section = Section::find($id);
        $section->delete();
        return redirect('api/sections');
    }
}
