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
    	
    	$users=DB::table('users')->where('id',session('uid'))->first();

      //dd($users);
    
    	//这是出售消息 
        $b = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                    ->where('orders.sale_uid','=',session('uid'))
                                     ->where('message.receive_uid','=',session('uid'))
                                    ->where('mes_status','0') 
                                    ->count();  
        //这是购买消息   
        $a = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                   ->where('orders.buy_uid','=',session('uid'))
                                   ->where('message.receive_uid','=',session('uid'))
                                   ->where('mes_status','0')  
                                   ->count();                             
        $num = $a +$b;  

        //购买订单待付款
        $bfukuan  = DB::table('orders')->where('buy_uid',session('uid'))
        						   ->where('buy_order_status','1')
        						   ->count();

         //购买订单待发货
        $bfahuo  = DB::table('orders')->where('buy_uid',session('uid'))
        						   ->where('buy_order_status','2')
        						   ->count();  

       //购买订单待收货
        $bshouhuo  = DB::table('orders')->where('buy_uid',session('uid'))
        						   ->where('buy_order_status','3')
        						   ->count();  
       //购买订单待评价
        $bpingjia  = DB::table('orders')->where('buy_uid',session('uid'))
        						   ->where('buy_order_status','4')
        						   ->count(); 


        //出售订单待付款
       $sfukuan  = DB::table('orders')->where('sale_uid',session('uid'))
                                      ->where('sale_order_status','1')
                                      ->count();
           
        //出售订单待发货  
        $sfahuo  = DB::table('orders')->where('sale_uid',session('uid'))
                                      ->where('sale_order_status','2')
                                      ->count();
                            
        //出售订单待收货
        $sshouhuo  = DB::table('orders')->where('sale_uid',session('uid'))
                                      ->where('sale_order_status','3')
                                      ->count();
                                                       
        //出售订单待评价                           
        $spingjia  = DB::table('orders')->where('sale_uid',session('uid'))
                                      ->where('sale_order_status','4')
                                      ->count();
        

        //查询状态为开启为1的status
        $status = DB::table('advs')->where('status','1')->get();
        

        /*echo "<pre>";            
        var_dump($status);die;*/
        
        //



        //dd($bpingjia);						   

    	return view('homes.center.index',['users'=>$users,'num'=>$num,'bfukuan'=>$bfukuan,'bfahuo'=>$bfahuo,'bshouhuo'=>$bshouhuo,'bpingjia'=>$bpingjia,'sfukuan'=>$sfukuan,'sfahuo'=>$sfahuo,'sshouhuo'=>$sshouhuo,'spingjia'=>$spingjia],['status'=>$status]);
    }

}
