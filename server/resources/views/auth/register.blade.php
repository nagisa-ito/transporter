@extends('layouts.app')

@section('content')
<div class="container">
    <div class="column is-8 is-offset-2">
        <h2 class="title">Register</h2>
        <progress class="progress is-small is-primary" max="100" value="25">30%</progress>
    </div>

    {{-- Formファザードを使うともっと簡単にかける --}}
    <form method="POST" action="{{ route('register') }}">
    @csrf
        <div class="column is-6 is-offset-3">
            <div class="field is-horizontal mb-30">
                <div class="field-label is-normal">
                    <label class="label">Eメール</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" autofocus
                                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="xxx.yyy@e-grant.net">
                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>

                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" placeholder="Enter Password">
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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
                            <input id="password-confirm" type="password" class="input @error('password-confirm') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter Password">
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <input id="last_name" type="text" class="input @error('name') is-invalid @enderror"
                                name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="大黒丸">
                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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
                            <input id="first_name" type="text" class="input @error('first_name') is-invalid @enderror"
                                name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="こづち">
                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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
                            <!-- Laravel側から変数取り込み -->
                            <select name="department_id">
                                <option value="1">セールスマーケティング部</option>
                                <option value="2">CRM戦略推進部</option>
                                <option value="3">CRMマネジメントサービス部</option>
                                <option value="4">開発部</option>
                                <option value="5">管理部</option>
                                <option value="6">日本通販CRM協会</option>
                                <option value="7">事業開発室</option>
                            </select>

                            @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- 定期は別テーブルなので別に登録しないといけない -->
            <!-- <div class="field is-horizontal mb-30">
                <div class="field-label is-normal">
                    <label class="label">乗車駅</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" placeholder="品川">
                            <span class="icon is-small is-left"><i class="fas fa-walking"></i></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal mb-30">
                <div class="field-label is-normal">
                    <label class="label">降車駅</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" placeholder="五反田">
                            <span class="icon is-small is-left"><i class="fas fa-walking fa-flip-horizontal"></i></span>
                        </p>
                    </div>
                </div>
            </div> -->

        </div>

        <div class="column is-8 is-offset-2 text-right">
            <button type="submit" class="button is-primary">{{ __('新規登録') }}</button>
        </div>
    </form>
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
