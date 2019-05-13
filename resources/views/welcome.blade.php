@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/mycss.css">
@endsection

@section('contentWelcome')


<div class="container-fluid">
    <div class="row">
        <div class="offset-md-4 col-md-4 shadow-lg p-3 mb-5 bg-white rounded nameSite">
            <h1>TrouveTonResto</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-4">
            <button class="btn btn-primary btn-lg mybut" ><input type="text" name="" id="inputCity" class="input1" placeholder="Rechercher par ville"/><img src="images/search.png" class="img-fluid col-md-4 imgSearch" type="button" onclick="processDataByCity()"></button>
        </div>
        <div class=" col-md-4">
            <button class="btn btn-primary btn-lg mybut"><input type="text" name="" id="inputName" class="input2" placeholder="Rechercher par nom"/><img src="images/search.png" class="img-fluid col-md-4 imgSearch"  type="button" onclick="processDataByName()"></button>
        </div>
    </div>
</div>



<script type="text/javascript">

    $(".input1").on('keyup', function (e) {
      if (e.keyCode == 13) {
          processDataByCity();
      }
    });
    $(".input2").on('keyup', function (e) {
      if (e.keyCode == 13) {
          processDataByName();
      }
    });

    function processDataByCity(){
        var city = document.getElementById("inputCity").value;
        var uri = "/researchCity/".concat(city);
        window.location.replace(uri);
    }
    function processDataByName(){
        var name =document.getElementById("inputName").value;
        var uri = "/researchName/".concat(name);
        window.location.replace(uri);
    }
</script>
<script src="/js/bootstrap.js"></script>
@endsection
