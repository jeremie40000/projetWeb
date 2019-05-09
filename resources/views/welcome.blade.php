@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/mycss.css">
@endsection

@section('contentWelcome')
<header>
    <div class="container-fluid myheader page-header">
    <div class="row">
        <div class="col-md-8 text-left">
            <a>Polytech IG3</a>
        </div>
        <div class="col-md-2 text-right">
            <button class="btn btn-primary btn-lg mybut">S'inscrire</button>
        </div>
        <div class="col-md-2 text-right">
            <button class="btn btn-primary btn-lg mybut">Se connecter</button>
        </div>
    </div>
</div>    
</header>


<div class="container-fluid" style="margin-top: 10%;">
    <div class="row">
        <div class="offset-md-4 col-md-4 shadow-lg p-3 mb-5 bg-white rounded nameSite">
            <h1>TrouveTonResto</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-4">
            <button class="btn btn-primary btn-lg mybut" ><input type="text" name="" id="inputCity" placeholder="Rechercher par ville"/><img src="images/search.png" class="img-fluid col-md-4 imgSearch" type="button" onclick="processDataByCity()"></button>
        </div>
        <div class=" col-md-4">
            <button class="btn btn-primary btn-lg mybut"><input type="text" name="" id="inputName" placeholder="Rechercher par nom"/><img src="images/search.png" class="img-fluid col-md-4 imgSearch"  type="button" onclick="processDataByName()"></button>
        </div>
    </div>
</div>

<footer class="page-footer font-small fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>

<script type="text/javascript">
    function processDataByCity(){
        
        var city = document.getElementById("inputCity").value;
        var uri = "/research/".concat(city);
        window.location.replace(uri);
    }
    function processDataByName(){
        alert(document.getElementById("inputName").value);
    }
</script>
@endsection