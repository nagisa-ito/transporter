@extends('layouts.app')

@section('title', 'sections')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/section.css') }}">
@endpush

@if ($is_regular)
    @section('page-title', '定期編集')
    @set($label, '定期')
    @set($placeholder, '定期(3ヶ月)')
    @set($submit_title, '定期を編集')
@else
    @section('page-title', 'お気に入り区間編集')
    @set($label, 'タイトル')
    @set($placeholder, 'クライアント名や施設名など')
    @set($submit_title, 'お気に入り区間を編集')
@endif

@section('content')
<div class="notification is-light">
    @if ($is_regular)
        定期の編集をします。<br><br>
        <strong>自動申請をしている場合、編集後の定期は次の申請時に反映されます。</strong><br>
        過去の申請分には反映されません。
    @else
        お気に入り区間の編集をします。<br><br>

        <a href="#"><strong>お気に入り区間とは？</strong></a><br>
        定期とは別に区間を登録することが出来ます。よく訪問するクライアントや施設の名前を登録することで、登録時の手間を軽減します。<br>
        ここで登録された項目は、交通費の申請ページから呼び出すことが出来ます。
    @endif
</div>

<div class="column is-6 is-offset-3">
    {{ Form::open(['action' => ['SectionController@update', $section->id], 'method' => 'PUT']) }}
        @csrf
        <div class="field mb-30">
            <label class="label">{{ $label }}</label>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input id="name" type="text" class="input @error('name') is-danger @enderror" autofocus
                            name="name" value="{{ $section->name }}" required autocomplete="name" placeholder="{{ $placeholder }}">
                        <span class="icon is-small is-left"><i class="fas fa-credit-card"></i></span>

                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </p>
                </div>
            </div>
        </div>

        {{ Form::hidden('user_id', Auth::id()) }}
        {{ Form::hidden('is_regular', 1) }}

        <label class="label">区間</label>
        <div class="field is-horizontal mb-30">
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input id="from" type="text" class="input @error('from') is-danger @enderror" autofocus
                            name="from" value="{{ $section->from }}" required autocomplete="from" placeholder="品川">
                        <span class="icon is-small is-left"><i class="fas fa-train"></i></span>

                        @error('from')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </p>
                </div>
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input id="to" type="text" class="input @error('from') is-danger @enderror" autofocus
                            name="to" value="{{ $section->to }}" required autocomplete="to" placeholder="五反田">
                        <span class="icon is-small is-left"><i class="fas fa-train"></i></span>

                        @error('to')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </p>
                </div>
            </div>
        </div>

        <div class="field mb-30">
            <label class="label">費用</label>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input id="cost" type="number" class="input @error('cost') is-danger @enderror" autofocus
                            name="cost" value="{{ $section->cost }}" required placeholder="11060">
                        <span class="icon is-small is-left"><i class="fas fa-yen-sign"></i></span>

                        @error('cost')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </p>
                </div>
            </div>
        </div>

        <div class="buttons">
            <button type="submit" class="button is-primary">
                <strong>{{ $submit_title }}</strong>
            </button>
            <a class="button" href="{{ url('sections/1') }}">{{ __('キャンセル')}}</a>
        </div>

    {{ Form::close() }}
</div>
@endsection
