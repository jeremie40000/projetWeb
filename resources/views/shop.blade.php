@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/mycss.css">

@endsection

@section('contentWelcome')

<div class="container">
  
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide multi-item-carousel" id="theCarousel">
        <div class="carousel-inner">
          <?php 
          if(count($paramImages)>0){
            echo '<div class="item active">
            <div class="col-xs-4"><a href="#1"><img src="'.$paramImages[0]->src.'" class="img-responsive"></a></div>
          </div>';
            for ($i = 1; $i < count($paramImages); $i++){
            echo '<div class="item ">
            <div class="col-xs-4"><a href="#1"><img src="'.$paramImages[$i]->src.'" class="img-responsive"></a></div>
          </div>';
            } 
          }
          ?>
          
          
          <!--  Example item end -->
        </div>
        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
    </div>
  </div>

  <div class="row">
    <h1 class="text-center bg-success"><dt>{{$paramShop->name}}</dt></h1>
  </div>
  
  <div class="row">
    
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
event.clientY
<script type="text/javascript">
  // Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});

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
  
@endsection