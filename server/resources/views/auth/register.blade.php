@extends('layouts.app')

@section('title', 'register')

@section('content')
<div class="container mb-30">
    @if (session('status'))
        <div class="notification is-primary">
            <button class="delete"></button>
            {{ session('status') }}
        </div>
    @endif

    {{ Form::open() }}
        @csrf
        <div class="column is-6 is-offset-3 box">
            <div class="column is-10 is-offset-1">
                <div class="column mb-10 text-center">
                    <h4 class="title is-4">{{ __('新規登録') }}</h4>
                </div>

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

                <div class="field">
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

                <label class="label">名前</label>
                <div class="field mb-30 is-horizontal">
                    
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input id="last_name" type="text" class="input @error('name') is-danger @enderror"
                                    name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="大黒丸">
                                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>

                                @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </p>
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input id="first_name" type="text" class="input @error('name') is-danger @enderror"
                                    name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="こづち">
                                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>

                                @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field mb-30">
                    <label class="label">部署</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="select">
                                {{ Form::select('department_id', $departments) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal mb-10">
                    <button type="submit" class="button is-primary is-fullwidth is-medium">
                        <strong>{{ __('Sign up') }}</strong>
                    </button>
                </div>

                <div class="field text-center mb-10">
                    <a class="text-center" href="{{ route('login') }}">
                        <small>{{ __('ログインはこちらから') }}</small>
                    </a>
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection
