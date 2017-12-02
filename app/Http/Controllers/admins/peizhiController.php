<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class peizhiController extends Controller
{
    //
    	public function peizhi()
    	{
    		return view('admins.config.config');
    		// return 1;
    	}

    	public function dupeizhi(Request $request)
    	{	
    		$a = DB::table('config')->where('id',1)->first();

    		$b = $_GET['num'];

    		if($b){
    			$c= DB::table('config')->where('id',1)->update(['config'=>0]);
    			if($c){
    				return 1;
    			}else{
    				return 0;
    			}
    		}else{
    			$d= DB::table('config')->where('id',1)->update(['config'=>1]);
    			if($d){
    				return 1;
    			}else{
    				return 0;
    			}
    		}
    	}
}
