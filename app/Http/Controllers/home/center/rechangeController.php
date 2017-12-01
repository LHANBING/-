<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use  App\Http\Model\Refund;
use  App\Http\Model\Order;
use  App\Http\Model\User;
use  App\Http\Model\Message;
use  App\Http\Model\Order_money;

class rechangeController extends Controller
{
    public function index ()

    {   
        //我是卖家  退货给我  查买家
        $res=DB::table('refund')->join('orders','orders.id','=','refund.order_id')
        						->join('users','users.id','=','orders.buy_uid')
        						->join('goods','goods.id','=','orders.goods_id')
        						->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
        						->where('orders.sale_uid','=',session('uid'))
        						->select('goodsdetail.pic','goods.title','users.username','orders.order_num','refund.*','orders.pay_money','orders.pay_yunfei')
                                ->get();

       //转换json子串                            
        foreach ($res as $key => $value) {
                 
                 $pic[$key] =  json_decode($value->pic); 

                 $res[$key]->pic = $pic[$key]->img1;    
             }                          
                        

       //dd($res);  
    	return view('homes.center.rechange',['res'=>$res]);
    }

    public function save(Request $Request)
    {
    	 
    	 //退货id
    	 $id = $Request->all()['id'];
   
   		 DB::beginTransaction();	
    	 //修改状态
    	 $res= Refund::where('id',$id)->update(['status'=>'2']);
          

         //查 钱 
         $pay_money = Refund::with('Order')->where('id',$id)->first()->order->pay_money;
         $pay_yunfei = Refund::with('Order')->where('id',$id)->first()->order->pay_yunfei;
         $buy_uid = Refund::with('Order')->where('id',$id)->first()->order->buy_uid;
         $order_id = Refund::with('Order')->where('id',$id)->first()->order->id;
        

         $money = $pay_money +$pay_yunfei;
 
        //给系统减钱
         $zhichu = Order_money::value('zhichu');  

         $all = $zhichu + $money ; 

         $A = Order_money::where('id',1)->update(['zhichu'=>$all]);
        

        //给买家加钱
         $u_money = User::where('id',$buy_uid)->value('money');

         $alls = $u_money + $money;

         $B = User::where('id',$buy_uid)->update(['money'=>$alls]);


         //给买家发消息
         $arr['send_uid'] = session('uid');
         $arr['receive_uid'] = $buy_uid;
         $arr['order_id'] = $order_id;
         $arr['msg_content'] = "卖家已收货,钱已经退回来啦";
         Message::create($arr);
         
           
         
         if($res && $A && $B){

			DB::commit();

         	echo 1;
         }else{

         	DB::rollback();
         	echo 0;
         }

    	

    }
}
