@extends('layouts.app')

@section('content')
<div class="column is-6 is-offset-3 box">
    <div class="column mb-10 mt-20 text-center">
        <h4 class="title is-4">{{ __('パスワードをリセット') }}</h4>
        <small class="subtitile">
            パスワードをリセットします。<br>登録しているメールアドレス、新しいパスワードを入力してください。
        </small>
    </div>

    <div class="column is-10 is-offset-1">
        {{ Form::open(['route' => 'password.update']) }}
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field is-horizontal mb-30">
                <div class="field-label is-normal">
                    <label class="label">メール</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="xxx.yyy@e-grant.net">
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

            <div class="field is-horizontal mb-30">
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
                    <strong>{{ __('Reset Password') }}</strong>
                </button>
            </div>

        {{ Form::close() }}
    </div>
</div>
@endsection
