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
      <!--Name Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Nom :</h3>
              </div>
              <div class="col-md-8">
                <input type="text" id="inputName" name="inputName" value="{{$user->name}}"></input>
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
                <input type="text" id="inputFirstName" name="inputFirstName" value="{{$user->firstname}}"></input>
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
                <input type="text" id="inputMobile" name="inputMobile" value="{{$user->mobile}}"></input>
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
                <input type="text" id="inputAddr" name="inputAddr" value="{{$user->addr}}"></input>
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
                <input type="text" id="inputPostalCode" name="inputPostalCode" value="{{$user->postalcode}}"></input>
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
                <input type="text" id="inputCity" name="inputCity" value="{{$user->city}}"></input>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary  w-50">Soumettre</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
