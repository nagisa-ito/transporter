@extends('layouts.app')

@section('title', 'profile')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="{{ session('class') }}">
            <button class="delete"></button>
            {{ session('status') }}
        </div>
    @endif

    <div class="column is-6 is-offset-3 box mb-30">
        <div class="column mb-20 mt-20 text-center">
            <h4 class="title is-4">{{ __('パスワード設定') }}</h4>
        </div>

        <div class="tabs is-boxed is-centered is-fullwidth">
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
                    <button type="submit" class="button is-primary is-fullwidth is-medium">
                        <strong>{{ __('Update Password') }}</strong>
                    </button>
                </div>
            </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
