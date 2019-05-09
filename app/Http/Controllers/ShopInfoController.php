<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopInfoController extends Controller
{
    public function index($param){
    	$s = DB::select("select * from shop where siret='$param'");
    	var_dump($s[0]);
    	//echo ''.$s->name.' '.$s->city.' '.$s->siret;
    }
}
