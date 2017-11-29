<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\message;
use DB;
use App\Http\Model\Order;
class NewsController extends Controller
{
    public function index (Request $Request)
    {

      
         //我购买的  收到的消息                            
         $arr = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                     ->join('goods','goods.id','=','orders.goods_id') 
                                     ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                     ->join('users','users.id','=','orders.sale_uid')
                                     ->where('orders.buy_uid','=',session('uid'))
                                     ->where('message.receive_uid','=',session('uid'))
                                     ->select('message.*','goods.title','goodsdetail.pic','users.username')
                                     ->orderBy('message.created_at','desc')
                                     ->get();


        //我出售的 我收到的
        $ar = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                 ->join('goods','goods.id','=','orders.goods_id') 
                                 ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                 ->join('users','users.id','=','orders.buy_uid')
                                 ->where('orders.sale_uid','=',session('uid'))
                                 ->where('message.receive_uid','=',session('uid'))
                                 ->select('message.*','goods.title','goodsdetail.pic','users.username')
                                 ->orderBy('message.created_at','desc')
                                 ->get();    

         //dd($ar);    
          //转换json子串                            
            foreach ($arr as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $arr[$key]->pic = $pic[$key]->img1;    
                 } 


          //转换json子串                            
            foreach ($ar as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $ar[$key]->pic = $pic[$key]->img1;    
                 }                          
                                 
    

        // dd($arr);                                                      

    	return view('homes.center.news',['arr'=>$arr,'ar'=>$ar,'Request'=>$Request]);
    }

    public function add (Request $Request)
    {
    	//订单id	
    	$id=$Request->all()['id'];
    	$res=DB::table('orders')->where('id',$id)->first();

        DB::beginTransaction();

        //添加提醒消息
         $arr['msg_content'] = "买家提醒您发货,请及时发货";
         $arr['order_id'] = $id;
         $arr['send_uid'] =session('uid');
         $arr['receive_uid'] = $res->sale_uid;            
        
        $A=message::create($arr);
    	

    	if($A ){
    		  DB::commit();
            echo 1;

    	}else{
            DB::rollback();
    		echo 0;
    	}

    }




 // 卖家发送  提示买家收货消息
     public function addm (Request $request)
    { 
      $num = $request->only(['num']);

      $order = Order::where('order_num',$num)->first();

      $order_id = $order['id'];

      $receive_uid=$order['buy_uid'];

      $uid=session('uid');

      $b= message::where(['order_id'=>$order_id,'send_uid'=>$uid,'receive_uid'=>$receive_uid])->first();

      // dd($b);
      if($b){
          return 0;
      }else{
        $a=message::create(['msg_content'=>'卖家提醒您及时确认收货!','order_id'=>$order_id,'send_uid'=>$uid,'receive_uid'=>$receive_uid]);
          if($a){
              return 1;
            }else{
              return 2;
            }
      }
      

      
    }





    //已读
    public function readed (Request $Request)
    {
       $id = ($Request->all()['id']);

       $bool=DB::table('message')->where('id',$id)->update(['mes_status'=>'1']);

       echo $bool;
    }

    //删除
    public function del (Request $Request)
    {   

         $id=$Request->all()['id'];

         $res = DB::table('message')->where('id',$id)->delete();

         echo $res;
    }	
}
