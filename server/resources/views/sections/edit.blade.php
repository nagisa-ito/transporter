@extends('layouts.app')

@section('title', 'sections')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/section.css') }}">
@endpush

@section('content')
<div class="container p-20">
    <h5 class="title is-5">定期編集</h5>

    @if (session('status'))
        <div class="{{ session('class') }}">
            <button class="delete"></button>
            {{ session('status') }}
        </div>
    @endif

    <div class="notification is-light">
        定期の編集をします。<br><br>
        <strong>自動申請をしている場合、編集後の定期は次の申請時に反映されます。</strong><br>
        過去の申請分には反映されません。
    </div>

    <div class="column is-6 is-offset-3">
        {{ Form::open(['action' => ['SectionController@update', $section->id], 'method' => 'PUT']) }}
            @csrf
            <div class="field mb-30">
                <label class="label">定期名</label>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="name" type="text" class="input @error('name') is-danger @enderror" autofocus
                                name="name" value="{{ $section->name }}" required autocomplete="name" placeholder="定期(3ヶ月)">
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
                    <strong>{{ __('定期を追加') }}</strong>
                </button>
                <a class="button" href="{{ url('sections') }}">{{ __('キャンセル')}}</a>
            </div>

        {{ Form::close() }}
    </div>
</div>
@endsection
