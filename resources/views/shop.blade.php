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
        <form action="{{url('/addimageshop')}}" method="post" enctype="multipart/form-data">
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


  new Glider(document.querySelector('.glider'), {
  slidesToScroll: 1,
  slidesToShow: 5.5,
  draggable: true,
  dots: '.dots',
  arrows: {
    prev: '.glider-prev',
    next: '.glider-next'
  }
})


$('#carouselExample').on('slide.bs.carousel', function (e) {


    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $('.carousel-item').length;

    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
    for (var i=0; i<$('.carousel-item').length; i++) {
      $('.carousel-item')[i].style.display="visible";
    }
});
$('#carouselExample').on('slid.bs.carousel', function (e) {
  for (var i=0; i<$('.carousel-item').length; i++) {
    $('.carousel-item')[i].style.display="visible";
  }
}

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
