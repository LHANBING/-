<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use DB;
class RechargeController extends Controller
{
    public function index()
    {
    	return view('homes.center.user_recharge');
    }

    public function dorecharge(Request $request)
    {	
    	$id  = session('uid');
    	
    	$money = $request->input('money');
    	DB::beginTransaction();

    	$res = DB::update('update users set money = money +'.$money.' where id = '.$id);

    	if($res)
    	{
    		DB::commit();
    		echo 1;
    	}else
    	{
    		DB::rollback();
    		echo 0 ;
    	}
    }
}
