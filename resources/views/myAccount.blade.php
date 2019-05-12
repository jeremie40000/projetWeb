@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/mycss.css">
@endsection

@section('contentWelcome')

<div class="container">
  <div class="row">
    <!--Profile Picture field-->
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="{{Auth::user()->profilepicture}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center"  style="margin-top:1%;">
          <form action="{{url('/uploadprofilepicture')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input name ="uploadpp" id="uploadpp" type="file" class="btn btn-primary" onchange="form.submit()"></input>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8  text-right">
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-primary" type="button" onclick="modifyClicked()">Modifier Informations Personnelles</button>
        </div>
      </div>
      <!--Name Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Nom :</h3>
              </div>
              <div class="col-md-8">
                <h3>{{$user->name}}</h3>
              </div>
            </div>
          </div>
      </div>
      <!--First Name Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Prénom : </h3>
              </div>
              <div class="col-md-8">
                <h3>{{$user->firstname}}</h3>
              </div>
            </div>
          </div>
      </div>
      <!--Mobile Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Mobile : </h3>
              </div>
              <div class="col-md-8">
                <h3>{{$user->mobile}}</h3>
              </div>
            </div>
          </div>
      </div>
      <!--Adresse Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Adresse : </h3>
              </div>
              <div class="col-md-8">
                <h3>{{$user->addr}}</h3>
              </div>
            </div>
          </div>
      </div>
      <!--Postal Code Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Code Postal : </h3>
              </div>
              <div class="col-md-8">
                <h3>{{$user->postalcode}}</h3>
              </div>
            </div>
          </div>
      </div>
      <!--City Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Ville : </h3>
              </div>
              <div class="col-md-8">
                <h3>{{$user->city}}</h3>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row" style="padding-top:5%;">
    <div class="col-md-12 text-center">
      <h2>---Liste des commerces---</h2>
    </div>
  </div>
  <div class="row" style="padding-top:5%;">
    <div class="col-md-12 text-center">
      <button class="btn btn-primary" onclick="addShopClicked()">Ajouter commerce</button>
    </div>
  </div>
</div>
<ul class="list-group"  style="margin-bottom: 10%;">
  @foreach ($shops as $shop)
    <button type="button" id="{{$shop->siret}}"  onclick="red({{$shop->siret}})" class="list-group-item btn mysearchlist" >
      <div class="container">
        <div class="row">
          <div class="col-md-4">

            <img src="{{$shop->profilepicture}}">
          </div>
          <div class="col-md-8 ">
            <div class="row">
              <div class="col text-right">
                <span class="badge badge-primary mybadgename"> <?php echo $shop->name;?></span>
              </div>
            </div>
            <div class="row right">
              <div class="col text-right">
                <?php echo $shop->addr;?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </button>
  @endforeach
</ul>

<script>
  function modifyClicked(){
    window.location.replace("/modifyPersInfo");
  }

  function addShopClicked(){
    window.location.replace("/addShop");
  }

	function red(id){
		var uri = '/shop/'.concat(id);
		window.location.replace(uri);
	}
</script>

@endsection
