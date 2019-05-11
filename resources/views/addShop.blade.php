@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/mycss.css">
@endsection

@section('contentWelcome')

<div class="container mypersinfoform">
  <div class="row">
    <div class="col-md-10  text-right">
      <form method="post" action="{{url('/updateAccount')}}">
        @csrf
        <!--Siret Field-->
        <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                  <h3>Numero de siret :</h3>
                </div>
                <div class="col-md-8">
                  <input type="text" id="inputSiret" name="inputSiret"></input>
                </div>
              </div>
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
                <input type="text" id="inputName" name="inputName"></input>
              </div>
            </div>
          </div>
      </div>
      <!--Phone Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Mobile : </h3>
              </div>
              <div class="col-md-8">
                <input type="text" id="inputPhone" name="inputPhone"></input>
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
                <input type="text" id="inputAddr" name="inputAddr"></input>
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
                <input type="text" id="inputPostalCode" name="inputPostalCode"></input>
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
                <input type="text" id="inputCity" name="inputCity"></input>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Etat : </h3>
              </div>
              <div class="col-md-8">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="inputOpeningState" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Etat
                  </button>
                  <div class="dropdown-menu" aria-labelledby="inputOpeningState">
                    <a class="dropdown-item" href="#">Ouvert</a>
                    <a class="dropdown-item" href="#">Fermé</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Profile Picture Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Photo : </h3>
              </div>
              <div class="col-md-8">
                <input name ="inputPicture" id="inputPicture" type="file" class="btn btn-primary"></input>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-12 text-center" style="margin-top:5%;">
        <button type="submit" class="btn btn-primary  w-50">Soumettre</button>
      </div>

    </form>
    </div>
  </div>
</div>

@endsection