@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


@endsection

@section('contentWelcome')

<style type="text/css" id="slider-css"></style>
<div class="spe-cor" >
<div class="container">
    <div class="row" >
      <div class="col-md-12">
        <div id="slider-2" class="carousel carousel-by-item slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @if(count($paramImages)>0)
                <div class="carousel-item active">
                  <div class="col-4">
                    <img src="{{$paramImages[0]->src}}" class="img-fluid rounded" >
                  </div>
                </div>';
                @for ($i = 1; $i < count($paramImages); $i++)
                <div class="carousel-item ">
                  <div class="col-4">
                    <img src="{{$paramImages[$i]->src}}" class="img-fluid rounded">
                  </div>
                </div>
                @endfor
              @endif
            </div>
            <a class="carousel-control-prev" href="#slider-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
  </div>
</div>
</div>
<div class="container text-center">

  @Auth
  @if(Auth::id()==$paramShop->idm)
  <div class="row">
      <div class="col-md-12 text-center" style="margin-top:2%;">
        <form action="{{url("/addimageshop/$paramShop->siret")}}" method="post" enctype="multipart/form-data">
          @csrf
          <input name ="addimage" id="addimage" type="file" class="mycard" onchange="form.submit()"></input>
        </form>
      </div>
  </div>
  @endif
  @endauth
  <div class="col-md-12 mymenulist mycard">
  <div class="row">
      <div class="col-md-12 text-center btn ">
        <h1 class="">{{$paramShop->name}}</h1>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12 text-center btn">
        <h6 class="">{{$paramShop->phone}}</h6>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12 text-center btn ">
        @foreach($paramHours as $hours)
        <div class="row">
          @if(auth()->check() AND Auth::id()==$paramShop->idm)
          <div class="offset-2 col-sm-8 col-8 text-center">
            <h4>{{$hours->day}} : {{$hours->start}}h - {{$hours->end}}h</h4>
          </div>

          <div class="col-sm-2 col-2 text-right" >
            <a href="{{url("/deleteHours/$hours->idhours")}}"><img class="img-fluid" src="/images/delete.png"></a>
          </div>
          @else
          <div class="col-sm-12 col-12 text-center">
            <h4 class="">{{$hours->day}} : {{$hours->start}}h - {{$hours->end}}h</h4>
          </div>
          @endif
        </div>
        @endforeach
      </div>
  </div>
</div>

  @Auth
  @if(Auth::id()==$paramShop->idm)
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="btn  mycard"  id="divHours">
      <div class="container">
        <form method="post" action="{{url("/addHours/$paramShop->siret")}}">
          @csrf
          <div class="row">
            <div class="col-md-12 text-center">
              <h2>Ajouter Créneau</h2>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                <select class="custom-select" name="inputDay">
                  <option selected>Jour...</option>
                  <option value="lundi">Lundi</option>
                  <option value="mardi">Mardi</option>
                  <option value="mercredi">Mercredi</option>
                  <option value="jeudi">Jeudi</option>
                  <option value="vendredi">Vendredi</option>
                  <option value="samedi">Samedi</option>
                  <option value="dimanche">Dimanche</option>
                </select>
              </div>
              <div class="col-md-12">
                <label>Debut : </label>
                <input type="number" min="0" max="24" step="1" name="inputStart">
              </div>
              <div class="col-md-12">
                <label>Fin : </label>
                <input type="number" min="0" max="24" step="1" name="inputEnd">
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center" style="margin-top:5%;">
              <button type="submit" class="btn btn-primary  w-50">Soumettre</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
      <div class="btn  mycard"  style="margin-top:2%;" >
        <div class="container">
          <form method="post" action="{{url("/addmenu/$paramShop->siret")}}">
            @csrf
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
                  <input type="text" name="inputName" id="inputName"></input>
              </div>
              <div class="col-md-6">
                  <input type="number"  name="inputPrice" id="inputPrice"></input>
              </div>
            </div>
            <div class="row" style="padding-top:5%;">
              <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Ajouter</button>
              </div>
            </div>
          </form>
        </div>
      </button>
    </div>
  </div>
</div>
  @endif
  @endauth
  <div class="row">
    <div class="col-sm-12 col-12 text-center"  style="padding-top:10%;">
      <h2>---Liste des menus---</h2>
    </div>
  </div>
  <div class="row"  style="margin-bottom:10%;">
    <div class="col-md-12 text-center">
    <ul class="list-group">
      @foreach ($paramMenus as $menu)
        <button class="list-group-item btn mymenulist mycard"  >
          <div class="container myDishDetails" id="dishDetails{{$menu->idm}}" >
                      <div class="row">
                          <div class="col-md-4">
                              <img id="dishDetails{{$menu->idm}}/img" src="/images/profile0.jpeg" class="img-fluid rounded" style="max-width: 80%;" >
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
          <div class="container"  style="color:black;">
            <div class="row" >
              @if(auth()->check() AND Auth::id()==$paramShop->idm)
                <div class="col-sm-2 col-2 text-left" >
                  <a href="{{url("/setMenu/$menu->idm")}}"><img class="img-fluid rounded" src="/images/engrenage.png"></a>
                </div>
                <div class="col-8 col-sm-8">
                  <h1 class="text-center">{{$menu->name}}</h1>
                </div>
              @else
              <div class="col-12 col-sm-12">
                <h1 class="text-center">{{$menu->name}}</h1>
              </div>
                @endif


                @Auth
                @if(Auth::id()==$paramShop->idm)
                <div class="col-sm-2 col-2 text-right" >
                  <a href="{{url("/deleteMenu/$menu->idm")}}"><img class="img-fluid rounded" src="/images/delete.png"></a>
                </div>
              @endif
              @endauth
            </div>
            <div class="row">
              <div class="col-sm-4 col-4">
                <div class="row">
                  <div class="col-12 col-sm-12">
                    <h3>Entrees</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12">
                        @foreach($paramDishes as $dish)
                          @if($dish->idmenu == $menu->idm AND $dish->type==0)
                          <div class="row">
                            <div class="col-12 col-sm-12">
                            <a id="{{$dish->idd}}" onmouseover="displayDish('{{$dish->idmenu}}','{{$dish->name}}', '{{$dish->priceunit}}', '{{$dish->srcimage}}')"
                               onmouseout="hideDish('{{$dish->idmenu}}')" class="btn btn-primary mydishlink">{{$dish->name}}</a>
                              <a href="{{url("/deleteDish/$dish->idd")}}"><img src="/images/deleteDish.png"></a>
                            </div>
                          </div>
                          @endif
                        @endforeach
                    </div>
                  </div>
                </div>

              <div class="col-sm-4 col-4">
                <div class="row">
                  <div class="col-12 col-sm-12">
                    <h3>Plats</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12">
                      @foreach($paramDishes as $dish)
                          @if($dish->idmenu == $menu->idm AND $dish->type==1)
                          <div class="row">
                            <div class="col-12 col-sm-12">
                            <a id="{{$dish->idd}}" onmouseover="displayDish('{{$dish->idmenu}}','{{$dish->name}}', '{{$dish->priceunit}}', '{{$dish->srcimage}}')"
                               onmouseout="hideDish('{{$dish->idmenu}}')" class="btn btn-primary mydishlink">{{$dish->name}}</a>
                              <a href="{{url("/deleteDish/$dish->idd")}}"><img src="/images/deleteDish.png"></a>
                            </div>
                          </div>
                          @endif
                        @endforeach
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-4">
                <div class="row">
                  <div class="col-12 col-sm-12">
                    <h3>Deserts</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12">
                      @foreach($paramDishes as $dish)
                          @if($dish->idmenu == $menu->idm AND $dish->type==2)
                          <div class="row">
                            <div class="col-12 col-sm-12">
                            <a id="{{$dish->idd}}" onmouseover="displayDish('{{$dish->idmenu}}','{{$dish->name}}', '{{$dish->priceunit}}', '{{$dish->srcimage}}')"
                               onmouseout="hideDish('{{$dish->idmenu}}')" class="btn btn-primary mydishlink">{{$dish->name}}</a>
                              <a href="{{url("/deleteDish/$dish->idd")}}"><img src="/images/deleteDish.png"></a>
                            </div>
                          </div>
                          @endif
                        @endforeach
                  </div>
                </div>
              </div>
            </div>


          </div>
        </button>
      @endforeach
    </ul>
  </div>

  </div>

</div>

<script type="text/javascript">

function GetUnique(e) {
    var l = [],
        s = temp_c = [],
        t = ["col-md-1", "col-md-2", "col-md-3", "col-md-4", "col-md-6", "col-md-12", "col-sm-1", "col-sm-2", "col-sm-3", "col-sm-4", "col-sm-6", "col-sm-12", "col-lg-1", "col-lg-2", "col-lg-3", "col-lg-4", "col-lg-6", "col-lg-12", "col-xs-1", "col-xs-2", "col-xs-3", "col-xs-4", "col-xs-6", "col-xs-12", "col-xl-1", "col-xl-2", "col-xl-3", "col-xl-4", "col-xl-6", "col-xl-12"];
    $(e).each(function() {
        for (var l = $(e + " > div").attr("class").split(/\s+/), t = 0; t < l.length; t++) s.push(l[t])
    });
    for (var c = 0; c < s.length; c++) temp_c = s[c].split("-"), 2 == temp_c.length && (temp_c.push(""), temp_c[2] = temp_c[1], temp_c[1] = "xs", s[c] = temp_c.join("-")), -1 == $.inArray(s[c], l) && $.inArray(s[c], t) && l.push(s[c]);
    return l
}

function setcss(e, l, s) {
    for (var t = ["", "", "", "", "", ""], c = d = f = g = 0, r = [1200, 992, 768, 567, 0], o = [], a = 0; a < e.length; a++) {
        var i = e[a].split("-");
        if (3 == i.length) {
            switch (i[1]) {
                case "xl":
                    d = 0;
                    break;
                case "lg":
                    d = 1;
                    break;
                case "md":
                    d = 2;
                    break;
                case "sm":
                    d = 3;
                    break;
                case "xs":
                    d = 4
            }
            t[d] = i[2]
        }
    }
    for (var n = 0; n < t.length; n++)
        if ("" !== t[n]) {
            if (0 === c && (c = 12 / t[n]), f = 12 / t[n], g = 100 / f, a = s + " > .carousel-item.active.carousel-item-right," + s + " > .carousel-item.carousel-item-next {-webkit-transform: translate3d(" + g + "%, 0, 0);transform: translate3d(" + g + ", 0, 0);left: 0;}" + s + " > .carousel-item.active.carousel-item-left," + s + " > .carousel-item.carousel-item-prev {-webkit-transform: translate3d(-" + g + "%, 0, 0);transform: translate3d(-" + g + "%, 0, 0);left: 0;}" + s + " > .carousel-item.carousel-item-left, " + s + " > .carousel-item.carousel-item-prev.carousel-item-right, " + s + " > .carousel-item.active {-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0);left: 0;}", f > 1) {
                for (k = 0; k < f - 1; k++) o.push(l + " .cloneditem-" + k);
                o.length && (a = a + o.join(",") + "{display: block;}"), o = []
            }
            0 !== r[n] && (a = "@media all and (min-width: " + r[n] + "px) and (transform-3d), all and (min-width:" + r[n] + "px) and (-webkit-transform-3d) {" + a + "}"), $("#slider-css").prepend(a)
        } $(l).each(function() {
        for (var e = $(this), l = 0; l < c - 1; l++)(e = e.next()).length || (e = $(this).siblings(":first")), e.children(":first-child").clone().addClass("cloneditem-" + l).appendTo($(this))
    })
}

//Use Different Slider IDs for multiple slider
$(document).ready(function() {
    var item = '#slider-1 .carousel-item';
    var item_inner = "#slider-1 .carousel-inner";
    classes = GetUnique(item);
    setcss(classes, item, item_inner);


    var item_1 = '#slider-2 .carousel-item';
    var item_inner_1 = "#slider-2 .carousel-inner";
    classes = GetUnique(item_1);
    setcss(classes, item_1, item_inner_1);
});

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

function addHours(){
  //window.location.replace("/addHours/{}");
  var d = document.getElementById('divHours');
  d.style.display="inline";
}
</script>

@endsection
