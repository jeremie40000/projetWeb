@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>

@endsection

@section('contentWelcome')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{$paramImage->src}}">
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col text-center">
                    <h1>{{$paramDish->name}}</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col text-center">
                    <h2>Prix a la carte : {{$paramDish->priceunit}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
