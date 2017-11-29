<?php

namespace App\Http\Controllers\admins;

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

    	})->where('order_num','like','%'.$request->input('search').'%')->where('orders.buy_order_status','=','5')->get();

    	//联查卖家
    	$r = Order::join('users',function($join){

    		$join->on('users.id','=','orders.sale_uid');

    	})->where('order_num','like','%'.$request->input('search').'%')
          ->where('orders.buy_order_status','=','5')
          ->select('orders.*','users.username')  
          ->get();
 		
    	//查询信息
 		$re = DB::table('goods')->join('orders',function($join){

    		$join->on('orders.goods_id','=','goods.id');

    	})->where('order_num','like','%'.$request->input('search').'%')->where('orders.buy_order_status','=','5')->orderBy('orders.id')->paginate($request->input('num',5));

                  

      //dd($re);

      	     
 		//获取总数
        $count = Order::where('order_num','like','%'.$request->input('search').'%')->where('orders.buy_order_status','=','5')->count();

 		$last  = $re->lastPage();

       // dd($count);
 	
		return view('admins.order.index',['re'=>$re,'res'=>$res,'r'=>$r,'request'=>$request,'count'=>$count,'last'=>$last]);    	
    }

    public function online (Request $request)
    {    
    	//联查买家
    	$res = Order::join('users',function($join){

    		$join->on('users.id','=','orders.buy_uid');

    	})->where('order_num','like','%'.$request->input('search').'%')
          ->where('orders.buy_order_status','<','5')->get();



    	//联查卖家
    	$r = Order::join('users',function($join){

    		$join->on('users.id','=','orders.sale_uid');

    	})->where('order_num','like','%'.$request->input('search').'%')
          ->where('orders.buy_order_status','<','5')
          ->select('orders.*','users.username')  
          ->get();
 		
 		//查询信息
 		$re = DB::table('goods')->join('orders',function($join){

    		$join->on('orders.goods_id','=','goods.id');

    	})->where('orders.buy_order_status','<','5')
          ->where('order_num','like','%'.$request->input('search').'%')
          ->orderBy('orders.id')
          ->paginate($request->input('num',5));

          
      	 //dd($re);
 		//获取总数
        $count = Order::where('order_num','like','%'.$request->input('search').'%')->where('orders.buy_order_status','<','5')->count();

 		$last  = $re->lastPage();
 	
		return view('admins.order.online',['re'=>$re,'res'=>$res,'r'=>$r,'request'=>$request,'count'=>$count,'last'=>$last]);    	
  
    }


   public function show (Request $Request)
   {
        //订单id
        $id = $Request->all()['id'];


       //该订单买家评论
       $res =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                ->join('goods','goods.id','=','orders.goods_id')
                                ->join('users','users.id','=','orders.buy_uid')    
                                ->where('comment.order_id','=',$id) 
                                ->select('comment.*','users.username','goods.title','orders.order_num','orders.buy_uid')
                                ->get();

       //该订单卖家评论
       $res1 =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                ->join('goods','goods.id','=','orders.goods_id')
                                ->join('users','users.id','=','orders.sale_uid') 
                                   ->select('comment.*','users.username','goods.title','orders.order_num','orders.sale_uid')      
                                ->where('comment.order_id','=',$id) 
                                ->get();

                                
                      
//dd($res1);
       if(!empty($res) && !empty($res1)){

        return view('admins.order.show',['res'=>$res,'res1'=>$res1]);

       }else{

        return back()->with('mypj','没有评价'); 
       }                        
        
   }
}
