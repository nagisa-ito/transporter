@extends('layouts.app')

@section('title', 'profile')
@section('page-title', 'パスワード設定')

@section('content')

<div class="column is-10 is-offset-1">
    <div class="tabs">
        <ul>
            <li>
                <a href="{{ url('profile/edit') }}">
                    <span class="icon is-small"><i class="fas fa-id-card" aria-hidden="true"></i></span>
                    <span>Profile</span>
                </a>
            </li>
            <li class="is-active">
                <a>
                    <span class="icon is-small"><i class="fas fa-lock" aria-hidden="true"></i></span>
                    <span>Password</span>
                </a>
            </li>
        </ul>
    </div>

    {{ Form::open(['action' => 'UserController@update_password']) }}
        @csrf
            <div class="column is-10 is-offset-1">
            <div class="field">
                <label class="label">新しいパスワードを入力:</label>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="password" type="password" class="input @error('password') is-danger @enderror"
                                name="password" required autocomplete="new-password" placeholder="Enter Password">
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

                            @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </p>
                    </div>
                </div>
            </div>

            <div class="field mb-30">
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="password-confirm" type="password" class="input @error('password-confirm') is-danger @enderror"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter Password">
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal mb-30">
                <button type="submit" class="button is-primary">
                    <strong>{{ __('パスワードを更新') }}</strong>
                </button>
            </div>
        </div>
        </div>
    {{ Form::close() }}
</div>
@endsection
