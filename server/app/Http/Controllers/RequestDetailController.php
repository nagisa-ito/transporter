<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\RequestDetail;
use App\Models\RequestDetailType;
use App\Models\Transportation;

class RequestDetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $transportations = Transportation::all();
        $types = RequestDetailType::all();
        return view('request_details.show', compact('transportations', 'types'));
    }

    /**
     * 一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // user_idを持ってくる adminユーザーは別の処理が必要
        // TODO: yyyymmの指定もここでする
        $user_id = Auth::id();
        $request_details = RequestDetail::where('user_id', $user_id)->where('is_delete', false)->get();
        return $request_details;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return '通信できました';
    }
}
