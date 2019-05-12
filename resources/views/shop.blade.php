@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/mycss.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="/css/glider.min.css" rel="stylesheet">
@endsection

@section('contentWelcome')


<div class="container text-center" style="max-width:60%;">
  <div class="row">
    <div class="col-md-12 text-center" style="margin-top:2%;max-width:70%;margin-left:15%;margin-right:15%;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          @if(count($paramImages)>0)
            <div class="carousel-item active">
              <div class="col-xs-4"><a href="#1"><img src="{{$paramImages[0]->src}}" class="img-responsive"></a></div>
            </div>';
            @for ($i = 1; $i < count($paramImages); $i++)
            <div class="carousel-item ">
              <div class="col-xs-4"><a href="#1"><img src="{{$paramImages[$i]->src}}" class="img-responsive"></a></div>
            </div>
            @endfor
          @endif
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
  </div>
  @Auth
  @if(Auth::id()==$paramShop->idm)
  <div class="row">
      <div class="col-md-12 text-center" style="margin-top:2%;">
        <form action="{{url("/addimageshop/$paramShop->siret")}}" method="post" enctype="multipart/form-data">
          @csrf
          <input name ="addimage" id="addimage" type="file" class="btn btn-primary" onchange="form.submit()"></input>
        </form>
      </div>
  </div>
  @endif
  @endauth
  <div class="row">
      <div class="col-md-12 text-center" style="margin-top:2%;">
        <h1 class="">{{$paramShop->name}}</h1>
      </div>
  </div>
  @Auth
  @if(Auth::id()==$paramShop->idm)
  <div class="btn mymenulist"  >
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Ajouter menu</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          Nom :
        </div>
        <div class="col-md-6">
          Prix :
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <input type="text"></input>
        </div>
        <div class="col-md-6">
            <input type="number"></input>
        </div>
      </div>
      <div class="row" style="padding-top:5%;margin-bottom:-6%;">
        <div class="col-md-12">
          <button class="btn btn-primary" type="submit">Ajouter</button>
        </div>
      </div>
    </div>
  </button>
  @endif
  @endauth
  <div class="row">
    <div class="col-md-12 text-center">
    <ul class="list-group"  style="margin-bottom: 10%;">
      <?php foreach ($paramMenus as $menu) { ?>
        <button class="list-group-item btn mymenulist"  >
          <div class="container myDishDetails" id="dishDetails{{$menu->idm}}" >
                      <div class="row">
                          <div class="col-md-4">
                              <img id="dishDetails{{$menu->idm}}/img" src="/images/profile0.jpeg" style="max-width: 80%;" >
                          </div>
                          <div class="col-md-8">
                              <div class="row">
                                  <div class="col text-center">
                                      <h1 id="dishDetails{{$menu->idm}}/h1">Name</h1>
                                  </div>
                              </div>
                              <div class="row ">
                                  <div class="col text-center">
                                      <h2 id="dishDetails{{$menu->idm}}/h2">Prix a la carte : Prix</h2>
                                  </div>
                              </div>
                          </div>
                      </div>
          </div>
          <div class="container">
            <div class="row">
              <h1 class="text-center">{{$menu->name}}</h1>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="row">
                  <h3>Entrees</h3>
                </div>
                <div class="row">
                  <ul>
                      @foreach($paramDishes as $dish)
                        @if($dish->idmenu == $menu->idm AND $dish->type==0)
                          <li><a id="{{$dish->idd}}" onmouseover="displayDish('{{$dish->idmenu}}','{{$dish->name}}', '{{$dish->priceunit}}', '{{$dish->srcimage}}')" onmouseout="hideDish('{{$dish->idmenu}}')" class="btn btn-primary mydishlink">{{$dish->name}}</a></li>
                        @endif
                      @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <h3>Plats</h3>
                </div>
                <div class="row">
                  <ul>
                    @foreach($paramDishes as $dish)
                        @if($dish->idmenu == $menu->idm AND $dish->type==1)
                          <li><a id="{{$dish->idd}}" onmouseover="displayDish('{{$dish->idmenu}}','{{$dish->name}}', '{{$dish->priceunit}}', '{{$dish->srcimage}}')" onmouseout="hideDish('{{$dish->idmenu}}')" class="btn btn-primary mydishlink">{{$dish->name}}</a></li>
                        @endif
                      @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <h3>Deserts</h3>
                </div>
                <div class="row">
                  <ul>
                    @foreach($paramDishes as $dish)
                        @if($dish->idmenu == $menu->idm AND $dish->type==2)
                          <li><a id="{{$dish->idd}}" onmouseover="displayDish('{{$dish->idmenu}}','{{$dish->name}}', '{{$dish->priceunit}}', '{{$dish->srcimage}}')" onmouseout="hideDish('{{$dish->idmenu}}')" class="btn btn-primary mydishlink">{{$dish->name}}</a></li>
                        @endif
                      @endforeach
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </button>
      <?php } ?>
    </ul>
  </div>
  </div>

</div>

<script type="text/javascript">

$("mydishlink").hover(
    function(event) {

    },
    function (event) {
        // The mouse has left the element, can reference the element via 'this'
    }
 );

function displayDish(id, name, price, imgs){
  var s = "dishDetails".concat(id);
  var d = document.getElementById(s);
  d.style.display="inline";
  
  document.getElementById(s.concat('/h1')).innerHTML = name;
  document.getElementById(s.concat('/h2')).innerHTML = "Prix a la carte : ".concat(price);
  document.getElementById(s.concat('/img')).src = imgs;
}
function hideDish(id){
  var s = "dishDetails".concat(id);
  document.getElementById(s).style.display="none";
}
</script>
<script src="/js/glider.min.js"></script>
@endsection
