<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/mycss.css">
</head>
<body>
    <div id="app">
        <header>
            <div class="container-fluid myheader">
                <div class="row">
                    <div class="col-md-2 text-left">
                        <h1 style="position:absolute;padding-top:6%;font-size: 200%;">TrouveTonResto</h1>
                    </div>
                    <div class="col-md-2 text-left">
                        <a class="homebut" href="{{url('/')}}"></a>
                    </div>
                    <div class="offset-md-4 col-md-2 text-right">
                        @auth
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg mybut">Se deconnecter</button>
                        </form>
                        @else
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('register') }}">S'inscrire</a>
                        @endif
                    </div>
                    <div class="col-md-2 text-right">
                        @guest
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('login') }}">Se connecter</a>
                        @else
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('login') }}">Mon compte</a>
                        @endif
                    </div>
                </div>
            </div>    
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
