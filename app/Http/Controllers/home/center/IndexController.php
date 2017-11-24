<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
     public function index ()
    {
    	$a= DB::table('message')->where('receive_uid',10)->where('mes_status','0')->count(); 
    	return view('homes.center.index',['a'=>$a]);
    }

}
