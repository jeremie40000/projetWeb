<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        @yield('titleWelcome')

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <header>
            <div class="container-fluid myheader">
                <div class="row">
                    @guest
                        <div class="col-md-8 text-left">
                    @else
                        <div class="col-md-6 text-left">
                    @endif
                            <a>TrouveTonResto</a>
                        </div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('register') }}">S'inscrire</a>
                        </div>
                        <div class="col-md-2 text-right">
                            @guest
                                <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('login') }}">Se connecter</a>
                            @else
                                <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('login') }}">Mon compte</a>
                            @endif
                        </div>
                            @auth
                                <div class="col-md-2 text-right">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-lg mybut">Se deconnecter</a>
                                    </form>
                                </div>
                            @endauth
                </div>
            </div>    
        </header>

        @yield('contentWelcome')
        
    </body>
</html>
