@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/mycss.css">
@endsection

@section('contentWelcome')
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-12 text-center"  style="padding-bottom:2%;">
      <h2>---Informations Personnelles---</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-12 text-center"   style="padding-bottom:2%;">
      <button class="btn btn-primary" style="box-shadow: 1px 1px 1px gray;" type="button" onclick="modifyClicked()">Modifier Informations Personnelles</button>
    </div>
  </div>
  <div class="row">
    <!--Profile Picture field-->
    <div class="col-md-4 text-center">
      <div class="row">
        <div class="col-sm-12 col-12 text-center" >
          <img class=" h-100 img-fluid rounded" src="{{Auth::user()->profilepicture}}" style="box-shadow: 10px 5px 5px gray;">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center"  style="margin-top:1%;margin-bottom:1%;">
          <form action="{{url('/uploadprofilepicture')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input name ="uploadpp" id="uploadpp" type="file" class="btn btn-primary" onchange="form.submit()" style="box-shadow: 1px 1px 1px gray;"></input>
          </form>
        </div>
      </div>
    </div>
    <div class="offset-1 offset-md-0 col-10 col-md-8  text-center  listInfoPers ">
      <div class="row h-100">
        <div class="col-sm-12 my-auto">

      <!--Name Field-->
      <div class="row">
          <div class="col-sm-12 col-12">
            <div class="row">
              <div class="col-sm-4 col-4 text-right">
                <h4>Nom :</h4>
              </div>
              <div class=" col-sm-8 col-8">
                <h4>{{$user->name}}</h4>
              </div>
            </div>
          </div>
      </div>
      <!--First Name Field-->
      <div class="row">
          <div class="col-sm-12 col-12">
            <div class="row">
              <div class="col-sm-4 col-4 text-right">
                <h4>Prénom : </h4>
              </div>
              <div class="col-sm-8 col-8">
                <h4>{{$user->firstname}}</h4>
              </div>
            </div>
          </div>
      </div>
      <!--Mobile Field-->
      <div class="row">
          <div class="col-sm-12 col-12">
            <div class="row">
              <div class="col-sm-4 col-4 text-right">
                <h4>Mobile : </h4>
              </div>
              <div class="col-sm-8 col-8">
                <h4>{{$user->mobile}}</h4>
              </div>
            </div>
          </div>
      </div>
      <!--Adresse Field-->
      <div class="row">
          <div class="col-sm-12 col-12">
            <div class="row">
              <div class="col-sm-4 col-4 text-right">
                <h4>Adresse : </h4>
              </div>
              <div class="col-sm-8 col-8">
                <h4>{{$user->addr}}</h4>
              </div>
            </div>
          </div>
      </div>
      <!--Postal Code Field-->
      <div class="row">
          <div class="col-sm-12 col-12">
            <div class="row">
              <div class="col-sm-4 col-4 text-right">
                <h4>Code Postal : </h4>
              </div>
              <div class="col-sm-8 col-8">
                <h4>{{$user->postalcode}}</h4>
              </div>
            </div>
          </div>
      </div>
      <!--City Field-->
      <div class="row">
          <div class="col-sm-12 col-12">
            <div class="row">
              <div class="col-sm-4 col-4 text-right">
                <h4>Ville : </h4>
              </div>
              <div class="col-sm-8 col-8">
                <h4>{{$user->city}}</h4>
              </div>
            </div>
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
  <div class="row" style="padding-top:2%;">
    <div class="col-md-12 text-center">
      <button class="btn btn-primary" style="box-shadow: 1px 1px 1px gray;" onclick="addShopClicked()">Ajouter commerce</button>
    </div>
  </div>
</div>
<ul class="list-group"  style="margin-bottom: 10%;">
  @foreach ($shops as $shop)
    <button type="button" id="{{$shop->siret}}"  onclick="red({{$shop->siret}})" class="list-group-item btn mysearchlist" >
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img class="img-fluid rounded" src="{{$shop->profilepicture}}">
          </div>
          <div class="col-md-8 " >
            <div class="row">
              <div class="col text-center">
                <span class="badge badge-primary mybadgename" style="margin-top:2%"> <?php echo $shop->name;?></span>
              </div>
            </div>
            <div class="row right">
              <div class="col text-center">
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
