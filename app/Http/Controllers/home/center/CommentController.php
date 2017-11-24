<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class CommentController extends Controller
{
    public function index()
    {	

    

    	$res=DB::table('goods')->join('comment','goods.id','=','comment.goods_id')
    					       ->where('goods.user_id',10)
    					       ->get();

    	$re = DB::table('comment')->join('goods','goods.id','=','comment.goods_id')
    						      ->where('comment.user_id',10)
    						      ->get();
        //dd($res);
    	return view('homes.center.comment',['res'=>$res,'re'=>$re]);
    }

    public function add (Request $Request)
    {	
    	//订单id
    	$id = $Request->all()['id'];

    	DB::beginTransaction();

    	$arr=DB::table('orders')->join('users','users.id','=','orders.sale_uid')
    							->join('goods','goods.id','=','orders.goods_id')
    							->where('orders.id',$id)
    							->select('goods.*','orders.*','users.*')
    							->first();
		
		$con=DB::table('goodsdetail')->where('goods_id',$arr->goods_id)->first();

    			

                     		
        if($con){             

                DB::commit();
    		return view('homes.center.addcomment',['arr'=>$arr,'con'=>$con,'oid'=>$id]);
    	}else{
                DB::rollback();    
    		return redirect()->back();
    	}


    }

    public function stro (Request $Request)
    {
    	$res=$Request->except('_token');
    
    	$_session['uid']=10;
        

    	//添加事务
    	DB::beginTransaction();
    	//添加评论
    	$arr['goods_id']=$res['hidden'];
    	$arr['comment'] = $res['content'];
    	$arr['user_id'] = $_session['uid'];
    	$bool=DB::table('comment')->insert($arr);

    	//添加消息
    	DB::table('goods')->where('user_id',$res['hidden'])->first();
        $new['send_uid']=$_session['uid'];
        $R=DB::table('orders')->where('id',$res['id'])->first();
      	$new['receive_uid']=$R->sale_uid;
    	$new['goods_id']=$res['hidden'];
    	$new['msg_content']="评论提醒";


        //修改订单状态()
        $order = DB::table('orders')->where('id',$res['id'])
                     ->update(['buy_order_status'=>'5','sale_order_status'=>'5']);  

    	 $bools=DB::table('message')->insert($new);

    	 if($bools && $bool && $order ){

    	 		DB::commit();
    	 
    	 		return redirect('/home/center/comment/index')->with('zcsg',"1");

    	 }else{
    	 		DB::rollback();
    	 		echo 0;

    	 }
    	
    }


    public function del (Request $Request)
    {
        $id = $Request->all()['id'];

        $bool=DB::table('comment')->where('id',$id)->delete();

        echo $bool;
    }
}
