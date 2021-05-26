<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Global Talent Library') }}</title>

    <!-- Scripts -->
    @if(app('env') == 'production')
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    @else
    <script src="{{ asset('js/app.js') }}" defer></script>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    @if(app('env') == 'production')
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @endif
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Global Talent Library') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link opinion-btn" data-toggle="modal" data-target="#opinion"><span class="text-primary">I</span>DEA！</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if(request()->path() !== 'login')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @endif
                            @if(request()->path() !== 'register')
                                <li class="nav-item">
                                    <a class="nav-link" href="/">利用申込</a>
                                    <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a> -->
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}様 <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('interest', ['id' => Auth::user()->id]) }}">気になる人一覧</a>
                                    <a class="dropdown-item" href="{{ route('history', ['id' => Auth::user()->id]) }}">面会申し込み履歴</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="modal fade" id="opinion" tabindex="-1" role="dialog" aria-labelledby="opinionTitle" aria-hidden="true">
            <div id="modal-dialog-opinion" class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="opinionTitle">ここを直すとGTLはもっと良くなるでしょう！</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('opinion.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="url" value="{{ url()->current() }}">
                        <input type="hidden" name="todo" value="1">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" columns="20" name="opinion" value="" required></textarea>
                        </div>
                        <div class="form-group">
                        <label for="photo" class="h5">修正すべき場所の写真があれば、添付してください！</label>
                        <input type="file" class="@error('photo') is-invalid @enderror" name="photo" accept="image/jpeg, image/png" required>
                        <p><small class="text-muted">※jpegもしくはpng</small></p>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">送信する</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
