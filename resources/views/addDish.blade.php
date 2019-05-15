@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
@endsection

@section('contentWelcome')

<div class="container mypersinfoform mycard">
  <div class="row">
    <div class="col-md-10  text-right">
      <form method="post" action="{{url("/recordDish/$menu")}}" enctype="multipart/form-data">
        @csrf
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
      <!--Price Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Prix :</h3>
              </div>
              <div class="col-md-8">
                <input type="number" id="inputPrice" name="inputPrice" ></input>
              </div>
            </div>
          </div>
      </div>
      <!--Type Dish Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <h3>Type : </h3>
              </div>
              <div class="offset-md-5 col-md-3">
                <select name="inputType" class="custom-select" id="inputType">
                  <option selected>Choisir...</option>
                  <option value="0">Entree</option>
                  <option value="1">Plat</option>
                  <option value="2">Dessert</option>
                </select>
              </div>
            </div>
          </div>
      </div>
      <!--Picture Field-->
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
      <div class="col-md-12 text-center" style="margin-top:2%;">
        <button type="submit" class="btn btn-primary  w-50">Soumettre</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
