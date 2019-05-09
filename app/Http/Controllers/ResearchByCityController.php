<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchByCityController extends Controller
{
    public function index($param){
    	$req = "select * from shop where city='$param'";
    	$shops = DB::select($req);
    	return view('research', ["shops"=>$shops]);
    }
}
