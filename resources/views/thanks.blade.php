<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Global Talent Library') }}</title>

    <!-- Scripts -->
    @if(app('env') == 'heroku')
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    @else
    <script src="{{ asset('js/app.js') }}" defer></script>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    @if(app('env') == 'heroku')
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @endif
    <!-- <style>
        body {
            font-family: sans-serif;
        }
    </style> -->
</head>
<body>
<div class="jumbotron jumbotron-fluid thanks" style="background: url(../../images/globe.jpg); height: 100vh;">
  <div class="container">
    <h1 class="display-4">利用申込み、ありがとうございました。</h1>
    <p class="lead">弊社にて審査の後、ログイン情報をご登録いただいたメールアドレス宛にお知らせ致します。</p>
  </div>
</div>
    </body>
    </html>