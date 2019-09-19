<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
        <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ url('/home') }}">Home</a>
            <a class="navbar-item">Documentation</a>
        </div>
        <div class="navbar-end">

        <div class="navbar-item">
            {{-- ユーザーが認証されているか --}}
            @auth
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">{{ Auth::user()->first_name }}</a>
                <div class="navbar-dropdown is-right">
                    <a class="navbar-item" href="{{ url('sections') }}">定期設定</a>
                    <a class="navbar-item">区間登録</a>
                    <a class="navbar-item" href="{{ url('profile/edit') }}">プロフィール設定</a>
                    <a class="navbar-item" href="{{ url('profile/edit_password') }}">パスワード設定</a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @else
            <div class="buttons">
                <a class="button is-primary" href="{{ route('register') }}">
                    <strong>{{ __('Sign up') }}</strong>
                </a>
                <a class="button is-light" href="{{ route('login') }}">{{ __('Log in') }}</a>
            </div>
            @endauth
        </div>
    </div>
</nav>

