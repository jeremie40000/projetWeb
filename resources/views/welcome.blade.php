@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>

@endsection

@section('contentWelcome')


<div class="container-fluid h-100 w-100" >
    <div class="row h-50 w-100" style="margin-left:0%;margin-right: 0%;margin-bottom:5%;">
      <div class="col-12 col-sm-12">
        <div class="mysearchlist mycard " style="margin-left: 40%;width:20%;position:absolute;z-index:1000000;">
          <input type="text" name="inputMap" id="inputMap" placeholder="Ville" style="text-align:center;"/>
        </div>
        <div class="spinner-border" style="display:none;position:absolute;z-index:1000000;margin-left:45%;margin-top:10%;" id="myspin"></div>
        <div name="mapid" id="mapid" class="mycard" style="margin-left: 10%; margin-right: 10%;height:100%;opacity:0.5;"></div>
      </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-4 offset-1 offset-sm-2 col-sm-8 col-10 text-center">
            <div class="btn-lg mycard mysearchbut">
              <input type="text" name="inputCity" id="inputCity" placeholder="Rechercher par ville" style="width:60%;"/>
              <img src="images/search.png" class=" col-sm-4 col-4 imgSearch" onclick="processDataByCity()">
            </div>
        </div>
        <div class=" col-sm-8 offset-1 offset-sm-5 col-10 col-md-4 text-center" style="margin-left:0%;">
            <div class="mysearchbut mycard btn-lg">
              <input type="text" name="inputName" id="inputName" placeholder="Rechercher par nom" style="width:60%;"/>
              <img src="images/search.png" class=" col-sm-4 col-4 imgSearch"  onclick="processDataByName()">
            </div>
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
      var name = ar[i].name;
      var city = ar[i].city;

      listNames.push(name);
      listCities.push(city);
    }

    let listNamesUnique = [...new Set(listNames)];
    let listCitiesUnique = [...new Set(listCities)];

    $("#inputMap").on('keyup', function (e) {
      if (e.keyCode == 13) {
          document.getElementById("myspin").style.display='inline';
          $.ajax({
            url:"{{ url('/ajaxMarkers') }}",
            type:'GET',
            data :{city:document.getElementById("inputMap").value},
            datatype : "JSON",
            success : function(tab){
              document.getElementById("myspin").style.display='none';
              document.getElementById("mapid").style.opacity=1;
              var tab = $.parseJSON(tab);
              for (var i = 0; i < tab.length; i++){
                var siret = tab[i].siret;
                var name = tab[i].name;
                var lat = tab[i].lat;
                var long = tab[i].long;
                var marker = L.marker([lat, long]).addTo(mymap);
                const content = "<div><div class=\"row\"><h3>"+name+"</h3></div><div class=\"row\"> <button style=\"width:100%;\" onclick=\"markerClicked("+siret+"\)\"class=\"btn btn-primary\">Voir</button</div></div>";
                marker.bindPopup(content);

                if(i==0){
                  mymap.setView([lat, long], 13);
                }
              }
            }
          });
      }
    });

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
