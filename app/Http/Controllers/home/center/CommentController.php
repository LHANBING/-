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

          
        //评价我的
    	/*$res=DB::table('comment')->join('goods','goods.id','=','comment.goods_id')
                                 ->join('goodsdetail','goodsdetail.goods_id','=','comment.goods_id')
                                 ->join('users','users.id','=','comment.ed_user_id')
                                 ->where('comment.ed_user_id',session('uid'))
                                 ->select('goodsdetail.pic','goods.title','comment.*','users.username')
                                 ->get();*/

          $res =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                    ->join('goods','goods.id','=','orders.goods_id')
                                    ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                    ->join('users','users.id','=','orders.buy_uid')    //这里重点
                                    ->where('orders.sale_uid','=',session('uid'))
                                    ->select('goodsdetail.pic','goods.title','comment.*','users.username')
                                    ->get();
                                                                                               

        //$res = DB::table('comment')->join('orders','orders.id','=','')                     
                                 
        //dd($res);                         

        //我的评价
    	/*$re = DB::table('comment')->join('goods','goods.id','=','comment.goods_id')
                                  ->join('users','users.id','=','comment.w_user_id')
                                  ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')   
    						      ->where('comment.w_user_id',session('uid'))
                                  ->select('goodsdetail.pic','goods.title','comment.*','users.username')
    						      ->get();*/

       $re =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                    ->join('goods','goods.id','=','orders.goods_id')
                                    ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                    ->join('users','users.id','=','orders.sale_uid')         //这里重点
                                    ->where('orders.buy_uid','=',session('uid'))
                                    ->select('goodsdetail.pic','goods.title','comment.*','users.username')
                                    ->get();
         //dd($res); 
                                                                
       // dd($re);                          
    	return view('homes.center.comment',['res'=>$res,'re'=>$re]);
    }

    public function add (Request $Request)
    {	
    	//订单id
    	$id = $Request->all()['id'];

    

    	$arr=DB::table('orders')->join('users','users.id','=','orders.sale_uid')
    							->join('goods','goods.id','=','orders.goods_id')
                                ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
    							->where('orders.id',$id)
    							->select('goods.title','orders.*','users.username','goodsdetail.pic','goods.newprice')
    	       					->first();
		//dd($arr); 
		$con=DB::table('goodsdetail')->where('goods_id',$arr->goods_id)->first();
          
        return view('homes.center.addcomment',['arr'=>$arr,'con'=>$con,'oid'=>$id]);
    

    }

    public function stro (Request $Request)
    {
    	$res=$Request->except('_token');
    
    	//订单id
         $id = $Request->all()['id'];

         $or=DB::table('orders')->where('id',$id)->first();
        


    	//添加事务
    	DB::beginTransaction();
    	//添加评论
    	/*$arr['goods_id']=$or->goods_id;

    	$arr['comment'] = $res['content'];

    	$arr['w_user_id'] =session('uid');
        $arr['ed_user_id']= $or->sale_uid;*/
       // dd($res);
        $arr['order_id'] = $id;
        $arr['comment'] = $res['content'];

    	$bool=DB::table('comment')->insert($arr);

        //给买家发送信息
        $res1['order_id'] = $id;
        $res1['msg_content'] = "评论成功";
       

       

        //修改订单状态()
        $order = DB::table('orders')->where('id',$id)
                     ->update(['buy_order_status'=>'5','sale_order_status'=>'5']);


        $A = DB::table('message')->insert($res1);
                  

    	// $bools=DB::table('message')->insert($new);

    	 if($bool && $order && $A ){

    	 		DB::commit();
    	 
    	 		return redirect('/home/center/comment/index')->with('zcsg',"评论成功");

    	 }else{

    	 		DB::rollback();
    	 		return redirect()->back();

    	 }
    	
    }


    public function del (Request $Request)
    {
        $id = $Request->all()['id'];

        $bool=DB::table('comment')->where('id',$id)->delete();

        echo $bool;
    }
}
