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
            <div class="mysearchbut mycard btn-lg">
                <input type="text" name="inputCity" id="inputCity" placeholder="Rechercher par ville"/>
              <img src="images/search.png" class="img-fluid col-md-4 imgSearch"  onclick="processDataByCity()">
            </div>
        </div>
        <div class=" col-md-4">
            <button class="mysearchbut mycard btn-lg">
              <input type="text" name="inputName" id="inputName" placeholder="Rechercher par nom"/>
              <img src="images/search.png" class="img-fluid col-md-4 imgSearch"  onclick="processDataByName()">
            </button>
        </div>
    </div>
</div>



<script type="text/javascript">
    var listNames=[];
    var listCities=[];
    var mymap = L.map('mapid').setView([43.6, 4], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 8}).addTo(mymap);

    var ar = <?php echo json_encode($shops) ?>;
    for (var i = 0; i < ar.length; i++){
      var siret = ar[i].siret;
      var name = ar[i].name;
      var lat = ar[i].lat;
      var long = ar[i].long;
      var city = ar[i].city;

      var marker = L.marker([lat, long]).addTo(mymap);
      const content = "<div><div class=\"row\"><h3>"+name+"</h3></div><div class=\"row\"> <button style=\"width:100%;\" onclick=\"markerClicked("+siret+"\)\"class=\"btn btn-primary\">Voir</button</div></div>";
      marker.bindPopup(content);

      listNames.push(name);
      listCities.push(city);
    }

    let listNamesUnique = [...new Set(listNames)];
    let listCitiesUnique = [...new Set(listCities)];

    $("#inputCity").on('keyup', function (e) {
      if (e.keyCode == 13) {

          processDataByCity();
      }
    });
    $("#inputName").on('keyup', function (e) {
      if (e.keyCode == 13) {
          processDataByName();
      }
    });

    $('#inputName').autocomplete({source:listNamesUnique});
    $('#inputCity').autocomplete({source:listCitiesUniques});

    function markerClicked(siret){
      var uri = "/shop/"+siret;
      window.location.replace(uri);
    }



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

@endsection
