<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Transporter - @yield('title', 'home')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/common.js') }}" defer></script>
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
    @include('layouts.header')

    {{-- app以下でVueが有効になっている --}}
    <div id="app" class="columns is-gapless" style="height: calc(100vh - 56px);">
        @auth
            {{-- ログイン済みの場合サイドバーを表示する --}}
            <div class="column is-2">
                @include('layouts.sidebar')
            </div>
            <div class="column is-10" style="overflow-y: auto;">
        @else
            <div class="column mt-30">
        @endauth
                <div class="container p-20">
                    <h5 class="title is-5"><span class="has-text-link ">#</span> @yield('page-title')</h5>

                    @if (session('status'))
                        <div class="{{ session('class') }}">
                            <button class="delete"></button>
                            {{ session('status') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
    </div>
</body>
</html>
