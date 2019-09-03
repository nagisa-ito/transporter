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
        <div class="column mb-10">
            <h4 class="title is-4">{{ __('パスワードリセット') }}</h4>
        </div>

        <div class="column is-10 is-offset-1">
            {{ Form::open(['route' => 'password.email']) }}
                @csrf
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

                <div class="field is-horizontal mb-10">
                    <button type="submit" class="button is-primary is-medium is-fullwidth">{{ __('Send Password Reset Link') }}</button>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
