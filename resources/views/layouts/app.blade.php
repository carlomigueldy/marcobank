<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ironforge Bank</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
        background-image: url("{{ asset('img/bank.jpeg') }}");
        background-size: cover;
        background-repeat: no-repeat;
    }
    </style>
</head>
<body>
    <div id="app">
        @include('includes.nav')
        @include('includes.sidenav')

        @if (Auth::check())
        <div class="py-4 container-fluid">
            <div class="row">
                <div class="col">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        @else
            <main class="py-4">
                @yield('content')
            </main>
        @endif

    </div>
</body>
</html>
