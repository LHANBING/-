<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class NewsController extends Controller
{
    public function index ()
    {
    	return view('homes.center.news');
    }

    public function add (Request $Request)
    {
    	//订单id	
    	$ids=$Request->all()['id'];
    	$id = substr($ids,-1,1);
    	$res=DB::table('orders')->where('id',$id)->first();

    	
    	$arr['buy_uid']=$res->buy_uid;
    	$arr['sale_uid']=$res->sale_uid;
    	$arr['goods_id']=$res->goods_id;
    	$arr['msg_content']="发货邀请";
    	
    	$bool=DB::table('message')->insert($arr);

    	if($bool ){
    		echo 1;
    	}else{
    		echo 0;
    	}

    }	
}
