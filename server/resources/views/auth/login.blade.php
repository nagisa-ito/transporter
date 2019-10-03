@extends('layouts.app')

@section('title', 'login')
@section('content')
<div class="container">
    <div class="column is-6 is-offset-3 box">
        <div class="column mb-20 mt-20">
            <h4 class="title is-4 text-center">{{ __('ログイン') }}</h4>
        </div>

        {{ Form::open() }}
            @csrf
            <div class="column is-10 is-offset-1">
                <div class="field mb-30">
                    <label class="label">メールアドレス</label>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input id="email" type="email" class="input @error('email') is-danger @enderror" autofocus
                                    name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="xxx.yyy@e-grant.net">
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>

                                @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field mb-30">
                    <label class="label">パスワード</label>
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

                <div class="field is-horizontal mb-20">
                    <label class="checkbox text-right" for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <small>{{ __('ログインしたままにする') }}</small>
                    </label>
                </div>

                <div class="field is-horizontal mb-10">
                    <button type="submit" class="button is-primary is-medium is-fullwidth">
                        <strong>{{ __('ログイン') }}</strong>
                    </button>
                </div>

                @if (Route::has('password.request'))
                    <div class="field text-center mb-20">
                        <a class="text-center" href="{{ route('password.request') }}">
                            <small>{{ __('パスワードを忘れましたか?') }}</small>
                        </a>
                    </div>
                @endif
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
