<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- <meta charset="utf-8"> -->
    <meta HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
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
                    <ul class="navbar-nav ml-auto login-top">
                        <!-- Authentication Links -->
                        @if(!Auth::check() && (!isset($authgroup) || !Auth::guard($authgroup)->check()))
                        @isset($authgroup)
                        <li class="nav-item"><a href="#" class="nav-link opinion-btn" data-toggle="modal" data-target="#opinion"><span class="text-primary">I</span>DEA！</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url("login/$authgroup") }}">{{ __('ログイン') }}</a></li>
                        @else
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a></li> -->
                        @endisset
                        @isset($authgroup)
                        @if (Route::has("$authgroup-register"))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("$authgroup-register") }}">{{ __('管理者登録') }}</a>
                        </li>
                        @endif
                        @else
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="/">{{ __('利用申込') }}</a> -->
                            <!-- <a class="text-decoration-none" data-toggle="modal" data-target="#applicationForm" href="{{ route('register') }}"> -->
                            <a class="nav-link" data-toggle="modal" data-target="#applicationForm" href="#">{{ __('利用申込') }}</a>
                        </li>
                        <div class="modal fade" id="applicationForm" tabindex="-1" role="dialog" aria-labelledby="applicationFormTitle" aria-hidden="true">
                            <div id="modal-dialog-appform" class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-secondary">
                                        <h5 class="modal-title text-white" id="applicationFormTitle">Global Talent Library利用申込フォーム</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" class="h-adr">
                                            @csrf
                                            <input type="hidden" name="oid" value="00D2v000001Xv2Z">
                                            <input type="hidden" name="retURL" value="https://sociarise.co.jp/service-guide/">
                                            <input type="hidden" id="lead_source" name="lead_source" value="Web">
                                            <input type="hidden" id="rating" name="rating" value="Warm">
                                            <input type="hidden" id="00N2u000000SqF0" name="00N2u000000SqF0" title="問い合わせ種別" value="Global Talent Library">
                                            <input type="hidden" class="p-country-name" value="Japan">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="company">会社名</label>
                                                    <input type="text" maxlength="40" size="20" class="form-control" id="company" name="company" value="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="title">役職</label>
                                                    <input type="text" maxlength="40" size="20" class="form-control" id="title" name="title" value="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="last_name">姓</label>
                                                    <input type="text" maxlength="80" size="20" class="form-control" id="last_name" name="last_name" value="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="first_name">名</label>
                                                    <input type="text" maxlength="40" size="20" class="form-control" id="first_name" name="first_name" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">メールアドレス</label>
                                                    <input type="email" maxlength="80" size="20" class="form-control" id="email" name="email" value="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="phone">電話番号</label>
                                                    <input type="tel" minlength="10" maxlength="17" size="20" class="form-control" id="phone" name="phone" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="zip">郵便番号</label>
                                                    <input type="text" class="form-control p-postal-code" id="zip" maxlength="8" name="zip" size="8" value="" placeholder="107-0052" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="state">都道府県</label>
                                                    <input type="text" class="form-control p-region" id="state" maxlength="20" name="state" size="20" value="" placeholder="東京都" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="city">市区町村</label>
                                                    <input type="text" maxlength="40" size="20" class="form-control p-locality" id="city" name="city" value="" placeholder="港区" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="street">町名・番地</label>
                                                <textarea class="form-control p-street-address p-extended-address" id="street" rows="3" columns="20" name="street" value="" placeholder="赤坂4-13-5 赤坂オフィスハイツ279号" required></textarea>
                                            </div>
                                            <div class="form-group form-check">
                                                <label class="form-check-label" for="00N2u000000SqEl"><a href="http://sociarise.co.jp/wp-content/uploads/policy.pdf" rel="noopener noreferrer" target="_blank" class="text-decoration-none">個人情報保護方針</a>に同意する</label>
                                                <input id="00N2u000000SqEl" name="00N2u000000SqEl" type="checkbox" value="1" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">送信する</button>
                                            <p class="text-right"><small>弊社サービス紹介も是非ご覧ください！</small></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endisset
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @isset($authgroup)
                                {{ Auth::guard($authgroup)->user()->name }} <span class="caret"></span>
                                @else
                                {{ Auth::user()->name }}様 <span class="caret"></span>
                                @endisset
                            </a>
                            
                            @isset($authgroup)
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('gt.index') }}">グローバルタレント登録＆一覧</a>
                                
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @else
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('interest', ['id' => Auth::user()->id]) }}">気になる人一覧</a>
                                <a class="dropdown-item" href="{{ route('history', ['id' => Auth::user()->id]) }}">面会申し込み履歴</a>
                                <a class="dropdown-item" href="{{ route('userProfile.show', ['id' => Auth::user()->id]) }}">ユーザー情報確認</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @endisset
                        </li>
                        @endif
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
                                <input type="file" class="@error('photo') is-invalid @enderror" name="photo" accept="image/jpeg, image/png">
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