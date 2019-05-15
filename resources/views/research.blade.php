@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/mycss.css">
@endsection

@section('contentWelcome')
<?php
      if(count($shops)==0){
        echo "<script>alert(\"Aucun restaurant de ce nom\")</script>";
        //renvoyer vers la page d'accueil
      }
      else{ ?>
        <ul class="list-group"  style="margin-bottom: 10%;">
  <span class="badge badge-secondary mybadgesearch">Liste des restaurants pour <?php echo $shops[0]->city;?></span>
  @foreach ($shops as $shop)
    <button type="button" id="{{$shop->siret}}"  onclick="red({{$shop->siret}})" class="list-group-item btn mysearchlist" >
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img class="img-fluid rounded" src="{{$shop->profilepicture}}">
          </div>
          <div class="col-md-8 ">
            <div class="row">
              <div class="col text-center">
                <span class="badge badge-primary mybadgename"> <?php echo $shop->name;?></span>
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <?php echo $shop->addr;?>
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <?php echo $shop->phone;?>
              </div>
            </div>
          </div>
        </div>
      </div>

    </button>
  @endforeach
</ul>

      <?php } ?>


<script type="text/javascript">
	function red(id){
		var uri = '/shop/'.concat(id);
		window.location.replace(uri);
	}
</script>

@endsection
