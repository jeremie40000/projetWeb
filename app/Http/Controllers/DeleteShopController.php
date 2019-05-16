<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteShopController extends Controller
{
    public function index(Request $req){
      DB::table('shop')->where('siret',$req->input('inputSiret'))->delete();
      $user = Auth::user();
      $req = "select * from shop where idm='$user->id'";
    	$shops = DB::select($req);
    	return view('myAccount', ['user'=>$user, 'shops'=>$shops]);
    }
}
