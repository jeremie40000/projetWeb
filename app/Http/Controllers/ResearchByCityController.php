<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchByCityController extends Controller
{
    public function index($city){
    	$shops = DB::select('select * from Menu');
    	foreach ($shops as $shop) {
    		echo $shop->name;
    	}
    }
}
