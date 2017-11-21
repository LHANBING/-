<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Model\User;
use \DB;
class OrderController extends Controller
{
    public function index(Request $request)
    {  

    	//联查买家
    	$res = Order::join('users',function($join){

    		$join->on('users.id','=','orders.buy_uid');

    	})->where('orders.order_otime','>','')->get();

    	//联查卖家
    	$r = Order::join('users',function($join){

    		$join->on('users.id','=','orders.sale_uid');

    	})->where('orders.order_otime','>','')->get();
 		
    	//查询信息
 		$re = DB::table('goods')->join('orders',function($join){

    		$join->on('orders.goods_id','=','goods.id');

    	})->where('order_num','like','%'.$request->input('search').'%')->where('orders.order_otime','>','')->orderBy('orders.id')->paginate($request->input('num',10));

      	 
 		//获取总数
        $count = Order::where('order_num','like','%'.$request->input('search').'%')->where('orders.order_otime','>','')->count();

 		$last  = $re->lastPage();
 	
		return view('admins.order.index',['re'=>$re,'res'=>$res,'r'=>$r,'request'=>$request,'count'=>$count,'last'=>$last]);    	
    }

    public function online (Request $request)
    {    
    	//联查买家
    	$res = Order::join('users',function($join){

    		$join->on('users.id','=','orders.buy_uid');

    	})->where('orders.order_otime','')->get();



    	//联查卖家
    	$r = Order::join('users',function($join){

    		$join->on('users.id','=','orders.sale_uid');

    	})->where('orders.order_otime','')->get();
 		
 		//查询信息
 		$re = DB::table('goods')->join('orders',function($join){

    		$join->on('orders.goods_id','=','goods.id');

    	})->where('order_num','like','%'.$request->input('search').'%')->where('orders.order_otime','')->orderBy('orders.id')->paginate($request->input('num',10));

      	 
 		//获取总数
        $count = Order::where('order_num','like','%'.$request->input('search').'%')->where('orders.order_otime','')->count();

 		$last  = $re->lastPage();
 	
		return view('admins.order.online',['re'=>$re,'res'=>$res,'r'=>$r,'request'=>$request,'count'=>$count,'last'=>$last]);    	
  	  	//return view('admins.order.online');
    }
}
