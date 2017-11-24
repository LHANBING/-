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

        $arr=DB::table('message')->join('goods','goods.id','=','message.goods_id')
                                 ->join('users','users.id','=','message.send_uid')      
                                 ->where('message.receive_uid',10)
                                 ->get();

        $ar = DB::table('message') ->where('receive_uid',10)->get();                     
    	return view('homes.center.news',['arr'=>$arr,'ar'=>$ar]);
    }

    public function add (Request $Request)
    {
    	//订单id	
    	$ids=$Request->all()['id'];
    	$id = substr($ids,-1,1);
    	$res=DB::table('orders')->where('id',$id)->first();

        //推送消息
        $arr['send_uid']=$res->buy_uid;
    	$arr['receive_uid']=$res->sale_uid;
    	$arr['goods_id']=$res->goods_id;
    	$arr['msg_content']="发货邀请";
    	
    	$bool=DB::table('message')->insert($arr);

    	if($bool ){
    		echo 1;
    	}else{
    		echo 0;
    	}

    }


    public function readed (Request $Request)
    {
       $id = ($Request->all()['id']);

       $bool=DB::table('message')->where('id',$id)->update(['mes_status'=>'1']);

       echo $bool;
    }

    public function show(Request $Request)
    {
        $res=DB::table('message')->join('users','users.id','=','message.send_uid')
                                 ->join('goods','goods.id','=','message.goods_id')   
                                 ->where('message.id',$Request->all()['id'])->first();

        
        return view('homes.center.showNews',['res'=>$res]);
    }


    public function del (Request $Request)
    {   

         $id=$Request->all()['id'];

         $res = DB::table('message')->where('id',$id)->delete();

         echo $res;
    }	
}
