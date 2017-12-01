<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Refund;
use App\Http\Model\Message;
use DB;

class ChangeController extends Controller
{
    public function index () 
    {
        
    	//我的退货
      $res = DB::table('refund')->join('orders','orders.id','=','refund.order_id')
                                ->join('goods','goods.id','=','orders.goods_id')
                                ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                ->join('users','users.id','=','orders.sale_uid')
                                ->where('orders.buy_uid','=',session('uid'))
                                ->select('users.username','goodsdetail.pic','goods.title','orders.order_num','refund.*','orders.pay_money','orders.pay_yunfei') 
                                ->get();
      ///转换json子串                            
      foreach ($res as $key => $value) {
               
               $pic[$key] =  json_decode($value->pic); 

               $res[$key]->pic = $pic[$key]->img1;    
           }                          
    
   //dd($res);
    	return view('homes.center.change',['res'=>$res]);
    }

    public function add (Request $Request)
    {
    	//订单id 
    	$id = $Request->all()['id'];
    	$arr=DB::table('orders')->join('goods','goods.id','=','orders.goods_id')
    				            ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
    				            ->join('users','users.id','=','orders.sale_uid')
    	                  ->where('orders.id',$id)
    	                  ->select('orders.*','goodsdetail.pic','goods.title','users.username')
    	                  ->first();
    	//dd($arr);

    	return view('homes.center.addChange',['arr'=>$arr]);
    } 


    public function stro (Request $Request)
    {
    	$arr = $Request->except('_token');

    	//订单id
		 $id = $arr['id'];
     $or = DB::table('orders')->where('id',$id)->first();

  	    DB::beginTransaction();

      //修改订单状态为 6 变成死订单  申请退货成功
		 $a=DB::table('orders')->where('id',$id)->update(['buy_order_status'=>'6','sale_order_status'=>'6']);
     
	 	 
 
		 //添加消息  7申请退货成功
		 $res1['order_id'] = $id;
		 $res1['msg_content'] ='买家退货成功';
     $res1['send_uid'] = session('uid');
     $res1['receive_uid'] = $or->sale_uid;

      $b = Message::create($res1);


     //添加退货数据
      $arr1['order_id'] = $id;  
      $arr1['ops'] = $arr['ops'];
      $arr1['content'] = $arr['area'];
      $arr1['status'] ='1';
//dd($arr);
//dd($arr1);
      $c=Refund::create($arr1);
     


		//dd($a);
        if($a && $b && $c ){

        	DB::commit();
        	return redirect('/home/center/change/index')->with('thcg','1');

        } else{

        	DB::rollback();
        	return back();
        }

    }



    public function rechange ()
    {
      echo "123";
    }
}
