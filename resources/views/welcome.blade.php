@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>

@endsection

@section('contentWelcome')


<div class="container-fluid h-100">
    <div class="row h-50 w-100" style="margin-bottom:5%;">
      <div class="col-12 col-sm-12">
        <div id="mapid" class="mycard" style="margin-left: 10%; margin-right: 10%;height:100%;"></div>
      </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-4">
            <button class="mysearchbut mycard btn-lg">
              <input type="text" name="" id="inputCity" class="input1" placeholder="Rechercher par ville"/>
              <img src="images/search.png" class="img-fluid col-md-4 imgSearch" type="button" onclick="processDataByCity()">
            </button>
        </div>
        <div class=" col-md-4">
            <button class="mysearchbut mycard btn-lg">
              <input type="text" name="" id="inputName" class="input2" placeholder="Rechercher par nom"/>
              <img src="images/search.png" class="img-fluid col-md-4 imgSearch"  type="button" onclick="processDataByName()">
            </button>
        </div>
    </div>
</div>



<script type="text/javascript">

    var mymap = L.map('mapid').setView([43.6, 4], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 8}).addTo(mymap);

    var ar = <?php echo json_encode($shops) ?>;
    for (var i = 0; i < ar.length; i++){
      var siret = ar[i].siret;
      var name = ar[i].name;
      var lat = ar[i].lat;
      var long = ar[i].long;

      var marker = L.marker([lat, long]).addTo(mymap);
      const content = "<div><div class=\"row\"><h3>"+name+"</h3></div><div class=\"row\"> <button style=\"width:100%;\" onclick=\"markerClicked("+siret+"\)\"class=\"btn btn-primary\">Voir</button</div></div>";
      marker.bindPopup(content);
    }


    function markerClicked(siret){
      var uri = "/shop/"+siret;
      window.location.replace(uri);
    }

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
