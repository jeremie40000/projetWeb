@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
@endsection

@section('contentWelcome')

<div class="container mycard mypersinfoform">
  <div class="row">
    <div class="col-sm-12 col-12 contentForm">
      <div class="row">
          <div class="col-md-12 text-center" style="margin-bottom:2%;">
            <h1>---Ajouter Plat---</h1>
          </div>
      </div>
      <form method="post" action="{{url('/newShop')}}"  enctype="multipart/form-data">
        @csrf
        <!--Siret Field-->
        <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-sm-4">
                  <h3>Numero de siret :</h3>
                </div>
                <div class="col-sm-5">
                  <div class="mdc-text-field ">
                    <input class="mdc-text-field__input" type="text" id="inputSiret" name="inputSiret"></input>
                  </div>
                </div>
              </div>
            </div>
        </div>
      <!--Name Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Nom :</h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputName" name="inputName"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Phone Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Mobile : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputPhone" name="inputPhone"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Adresse Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Adresse : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputAddr" name="inputAddr"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Postal Code Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Code Postal : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputPostalCode" name="inputPostalCode"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--City Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Ville : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputCity" name="inputCity"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Lat Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Latitude : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputLatitude" name="inputLatitude"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Long Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Longitude : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputLongitude" name="inputLongitude"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Opening State Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Etat : </h3>
              </div>
              <div class="col-sm-5">
                <select class="mdc-select mdc-select__native-control" id="inputState" style="width:66.6%;">
                  <option value="" disabled selected></option>
                  <option value="1">Ouvert</option>
                  <option value="2">Ferme</option>
                </select>
              </div>
            </div>
          </div>
      </div>

      <!--Profile Picture Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Photo : </h3>
              </div>
              <div class="offset-sm-2 col-sm-3 text-center" style="margin-top: 2%;">
                <label for="inputPicture" class="label-file">Ajouter une photo</label>
                <input name ="inputPicture" id="inputPicture" type="file" style="display:none;"></input>
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
