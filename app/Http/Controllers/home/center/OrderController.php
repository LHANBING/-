<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;
use App\Http\Model\Order;

use \DB;
class OrderController extends Controller
{
    public function index () 
    {
    	
            $_session['uid']=10;
    		//联查商品
    	/*	$res=Good::join('orders',function($join){

    			$join->on('goods.id','=','orders.goods_id');

  	  		})->where('orders.buy_uid',$_session['uid'])->orderBy('orders.buy_order_status')->get(); 
	*/
            $res = DB::table('orders')->join('goods','goods.id','=','orders.goods_id')
                                      ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                      ->where('orders.buy_uid',$_session['uid'])
                                      ->orderBy('orders.buy_order_status')
                                      ->get();
            //dd($res);                          

    	return  view('homes.center.order',['res'=>$res]);
    }
 
  

    public function list1 (Request $Request)
    {       
            $status=$Request->all()['status'];


            $_session['uid']=10;
    	    //联查商品
            $res=Good::join('orders',function($join){

                $join->on('goods.id','=','orders.goods_id');

            })->where('orders.buy_uid','=',$_session['uid'])->where('orders.buy_order_status',$status)->get();

            echo json_encode($res);
    }


    public function pay (Request $Request)
    {
        
         $ids=$Request->all()['id'];
         $id = substr($ids,-1,1);
         //echo $id;


        //传过来的订单id
        //$id =$Request->all()['id'];



        $res=DB::table('orders')->where('id',$id)->first();

        $money = $res->pay_money+$res->pay_yunfei;

        $arr=DB::table('users')->join('orders',function($query){

            $query->on('orders.buy_uid','=','users.id');
            
        })->where('orders.id',$id)->first();

        //判断用户钱是否够
        if($money > $arr->money){

            
            echo 0;die;
        }

         $a = $arr->money - $money; 

         $b = DB::table('orders_money')->value('shouru') + $money; 

         //开启事务
         DB::beginTransaction();

         $A = DB::table('orders_money')->update(['shouru'=>$a]);

         $B =DB::table('users')->where('id',$res->buy_uid)->update(['money'=>$b]); 

         $C =DB::table('orders')->where('id',$id)->update(['buy_order_status'=>'2','sale_order_status'=>'2']);

        //var_dump($B);         

        if($A && $B &&$C){
            DB::commit();
            
            echo 1;
            
        }else{
            DB::rollback();
          
            echo 2;
        }
    }

    public function sure(Request $Request)
    {
        $id = substr($Request->all()['id'],-1,1);

     
        $A=DB::table('orders')->where('id',$id)->update(['buy_order_status'=>'4','sale_order_status'=>'4']);
  
        
        if($A ){
        
            echo 1;
        }else{
         
            echo 0;
        }

    
    }
  
}
