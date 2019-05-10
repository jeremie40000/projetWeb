<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    public function index($param){
    	$d = DB::select("select * from dish where idd='$param'");
    	$s = $d[0]->idimage;
    	$i = DB::select("select * from image where idi=$s");
    	return view ('dish', ['paramDish'=>$d[0], 'paramImage'=>$i[0]]);
    }
}
