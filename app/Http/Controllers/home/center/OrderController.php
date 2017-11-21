<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;

use \DB;
class OrderController extends Controller
{
    public function index () 
    {
    	$_session['uid']=10;

    		//联查商品
    		$res=Good::join('orders',function($join){

    			$join->on('goods.id','=','orders.goods_id');

  	  		})->where('orders.buy_uid',$_session['uid'])->get();

    		
    	return  view('homes.center.order',['res'=>$res]);
    }

    public function list ()
    {
    	echo "123";
    }
  
}
