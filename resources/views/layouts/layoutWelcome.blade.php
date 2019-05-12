<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        @yield('titleWelcome')

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <header>
            <div class="container-fluid myheader">
                <div class="row">
                    <div class="col-md-2 text-left">
                        <h1 style="position:absolute;padding:6%;font-size: 200%;">TrouveTonResto</h1>
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
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ url('/myAccount') }}">Mon compte</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        @yield('contentWelcome')


        <div class="myfooter font-small fixed-bottom">

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
          </div>
          <!-- Copyright -->

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
    </body>
</html>
