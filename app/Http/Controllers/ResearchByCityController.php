<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchByCityController extends Controller
{
    public function index($param){

      if(strlen($param)==5 AND is_numeric($param)){
        $req = "select * from shop where postalcode='$param'";
      }else{
    	   $req = "select * from shop where city='$param'";
      }
    	$shops = DB::select($req);
    	return view('research', ["shops"=>$shops]);
    }
}
