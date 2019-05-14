<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        @yield('titleWelcome')




        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <header>
            <div class="container-fluid myheader">
                <div class="row">
                    <div class="col-md-2 text-left">
                        <a style="text-decoration:none;color:black;" href="/"><h1 style="position:absolute;padding:6%;">TrouveTonResto</h1></a>
                    </div>
                    <div class="offset-md-6 col-md-2 text-right">
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

    </body>
</html>
