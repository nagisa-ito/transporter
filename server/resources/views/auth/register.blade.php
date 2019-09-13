@extends('layouts.app')

@section('title', 'register')
@section('content')
<div class="container">
    <div class="column is-6 is-offset-3 box">
        <div class="column mb-20 mt-20 text-center">
            <h4 class="title is-4">{{ __('新規登録') }}</h4>
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

                <div class="field is-horizontal">
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
                    <div class="field-label is-normal">
                        <!-- Left empty for spacing -->
                    </div>
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
                    <div class="field-label is-normal">
                        <label class="label">姓</label>
                    </div>
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
                    </div>
                </div>

                <div class="field is-horizontal mb-30">
                    <div class="field-label is-normal">
                        <label class="label">名</label>
                    </div>
                    <div class="field-body">
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

                <div class="field is-horizontal mb-30">
                    <div class="field-label is-normal">
                        <label class="label">部署</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="select">
                                <select name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department['id'] }}">{{ $department['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal mb-10">
                    <button type="submit" class="button is-primary is-fullwidth is-medium">{{ __('Sign up') }}</button>
                </div>

                <div class="field text-center mb-20">
                    <a class="text-center" href="{{ route('login') }}">
                        <small>{{ __('ログインはこちらから') }}</small>
                    </a>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
