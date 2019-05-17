<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchByNameController extends Controller
{
    public function index($param){
    	$shops = DB::table('shop')->where('name', $param)->paginate(10);
    	return view('research', ["shops"=>$shops]);


    }
}
