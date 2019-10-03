@extends('layouts.app')

@section('title', 'profile')
@section('page-title', 'プロフィール設定')

@section('content')

<div class="column is-10 is-offset-1">
    <div class="tabs">
        <ul>
            <li class="is-active">
                <a>
                    <span class="icon is-small"><i class="fas fa-id-card" aria-hidden="true"></i></span>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ url('profile/edit_password') }}">
                    <span class="icon is-small"><i class="fas fa-lock" aria-hidden="true"></i></span>
                    <span>Password</span>
                </a>
            </li>
        </ul>
    </div>

    {{ Form::open(['action' => 'UserController@update']) }}
        @csrf
        {{ Form::hidden('id', $user->id) }}
        {{ Form::hidden('enable', $user->enable) }}
        <div class="column is-10 is-offset-1">
            <div class="field mb-30">
                <label class="label">メールアドレス</label>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="email" type="email" class="input @error('email') is-danger @enderror" value="{{ $user->email }}" autofocus
                                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="xxx.yyy@e-grant.net">
                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>

                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </p>
                    </div>
                </div>
            </div>

            <label class="label">名前</label>
            <div class="field is-horizontal mb-30">
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="last_name" type="text" class="input @error('name') is-danger @enderror" value="{{ $user->last_name }}"
                                name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="大黒丸">
                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>

                            @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="first_name" type="text" class="input @error('name') is-danger @enderror" value="{{ $user->first_name }}"
                                name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="こづち">
                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>

                            @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </p>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">部署</label>
                <div class="field-body">
                    <div class="field">
                        <div class="select">
                            {{ Form::select('department_id', $departments, $user->department_id) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal mb-30"></div>
                <button type="submit" class="button is-primary">
                    <strong>{{ __('プロフィールを更新') }}</strong>
                </button>
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection
