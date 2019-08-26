@extends('layouts.app')

@section('title', 'login')
@section('content')
<div class="container">
    <div class="column is-6 is-offset-3 box">
        <div class="column mb-10">
            <h4 class="title is-4">{{ __('ログイン') }}</h4>
        </div>

        {{ Form::open() }}
            @csrf
            <div class="column is-10 is-offset-1">
                <div class="field is-horizontal mb-30">
                    <div class="field-label is-normal">
                        <label class="label">メール</label>
                    </div>
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

                <div class="field is-horizontal mb-30">
                    <div class="field-label is-normal">
                        <label class="label">パスワード</label>
                    </div>
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
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="field is-horizontal mb-10">
                    <button type="submit" class="button is-primary is-medium is-fullwidth">{{ __('Log in') }}</button>
                </div>

                @if (Route::has('password.request'))
                    <div class="field text-center mb-10">
                        <a class="text-center" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </div>
                @endif
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
