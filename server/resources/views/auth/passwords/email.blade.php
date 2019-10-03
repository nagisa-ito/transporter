@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="notification is-primary">
            <button class="delete"></button>
            {{ session('status') }}
        </div>
    @endif

    <div class="column is-6 is-offset-3 box">
        <div class="column mb-10 mt-20 text-center">
            <h4 class="title is-4">{{ __('パスワードを忘れた場合') }}</h4>
            <small class="subtitile">
                パスワードをリセットします。<br>登録しているメールアドレスを入力してください。
            </small>
        </div>

        <div class="column is-10 is-offset-1">
            {{ Form::open(['route' => 'password.email']) }}
                @csrf
                <div class="field mb-20">
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

                <div class="text-center mb-20">
                    <small><b>上記メールアドレスに再設定用のURLを送信します。</b></small>
                </div>

                <div class="field mb-10 text-center">
                    <button type="submit" class="button is-primary is-fullwidth mb-10 is-medium">
                        <strong>{{ __('メールを送信') }}</strong>
                    </button>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
