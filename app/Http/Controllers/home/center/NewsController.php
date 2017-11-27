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

        //我的购买信息
        /*$arr = DB::table('message')->join('goods','goods.id','=','message.goods_id')
                                   ->join('users','users.id','=','message.send_uid')
                                   ->join('goodsdetail','goodsdetail.goods_id','=','message.goods_id') 
                                   ->where('message.shenfen','=','0')
                                   ->where('message.receive_uid','=',session('uid'))
                                   ->select('message.*','goods.title','goodsdetail.pic','users.username')
                                   ->get();*/

          $arr = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                     ->join('goods','goods.id','=','orders.goods_id') 
                                     ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                     ->join('users','users.id','=','orders.sale_uid')
                                     ->where('orders.buy_uid','=',session('uid'))
                                     ->select('message.*','goods.title','goodsdetail.pic','users.username')
                                     ->get();

         //dd($arr);                                                       

        //我的出售信息
       /* $ar = DB::table('message')->join('goods','goods.id','=','message.goods_id')
                                   ->join('users','users.id','=','message.send_uid')
                                   ->join('goodsdetail','goodsdetail.goods_id','=','message.goods_id') 
                                   ->where('message.shenfen','=','1')
                                   ->where('message.receive_uid','=',session('uid'))
                                   ->select('message.*','goods.title','goodsdetail.pic','users.username')
                                   ->get();  */    
         //我的出售信息                          
          $ar = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                     ->join('goods','goods.id','=','orders.goods_id') 
                                     ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                     ->join('users','users.id','=','orders.buy_uid')
                                     ->where('orders.sale_uid','=',session('uid'))
                                     ->select('message.*','goods.title','goodsdetail.pic','users.username')
                                     ->get();

       // dd($ar);                            

    	return view('homes.center.news',['arr'=>$arr,'ar'=>$ar]);
    }

    public function add (Request $Request)
    {
    	//订单id	
    	$id=$Request->all()['id'];
    	$res=DB::table('orders')->where('id',$id)->first();

        DB::beginTransaction();

        //添加提醒消息
         $arr['msg_content'] = "提醒发货";
         $arr['order_id'] = $id;            
        
        $A=DB::table('message')->insert($arr);
    	

    	if($A ){
    		  DB::commit();
            echo 1;

    	}else{
            DB::rollback();
    		echo 0;
    	}

    }


    public function readed (Request $Request)
    {
       $id = ($Request->all()['id']);

       $bool=DB::table('message')->where('id',$id)->update(['mes_status'=>'1']);

       echo $bool;
    }


    public function del (Request $Request)
    {   

         $id=$Request->all()['id'];

         $res = DB::table('message')->where('id',$id)->delete();

         echo $res;
    }	
}
