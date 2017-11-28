<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Comment;
use App\Http\Model\Message;
use DB;
use Session;

class CommentController extends Controller
{
    public function index()
    {	


     //我评价的  买家身份  评价卖家
       $A =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                ->join('goods','goods.id','=','orders.goods_id')
                                ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                ->join('users','users.id','=','orders.sale_uid')        
                                ->where('orders.buy_uid','=',session('uid'))   //这里重点
                                ->where('comment.b_id','=',session('uid'))
                                ->select('goodsdetail.pic','goods.title','comment.*','users.username')
                                ->get();

                            

     //我评价的 卖家身份 评价买家
       $B =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                ->join('goods','goods.id','=','orders.goods_id')
                                ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                ->join('users','users.id','=','orders.buy_uid')       
                                ->where('orders.sale_uid','=',session('uid'))   //这里重点
                                ->where('comment.b_id','=',session('uid'))
                                ->select('goodsdetail.pic','goods.title','comment.*','users.username')
                                ->get();

                              
     
                                
   //我被评价 买家身份   被卖家评价
         $C =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                 ->join('goods','goods.id','=','orders.goods_id')
                                 ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                 ->join('users','users.id','=','orders.sale_uid')       
                                ->where('orders.buy_uid','=',session('uid'))   //这里重点
                                ->where('comment.s_id','=',session('uid'))
                                ->select('goodsdetail.pic','goods.title','comment.*','users.username')
                                ->get();
                                
                                   
   //我被评价  卖家身份  被买家评价
         $D =DB::table('comment')->join('orders','orders.id','=','comment.order_id')
                                 ->join('goods','goods.id','=','orders.goods_id')
                                 ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                 ->join('users','users.id','=','orders.buy_uid')         
                                ->where('orders.sale_uid','=',session('uid'))
                                ->where('comment.s_id','=',session('uid'))      //这里重点
                                ->select('goodsdetail.pic','goods.title','comment.*','users.username')
                                ->get();
                                


    //我评价的                           我被评价的
    //我是买家身份 评论卖家              我是买家身份 ,卖家给我的评论
    //我是卖家身份 评论买家              我是卖家身份 ,买家给我的评价
    //b_id 评论人
    //s_id 被评论人
  

          //转换json子串                            
            foreach ($A as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $A[$key]->pic = $pic[$key]->img1;    
                 }                          
        
          //转换json子串                            
            foreach ($B as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $B[$key]->pic = $pic[$key]->img1;    
                 }                          
    
          //转换json子串                            
            foreach ($C as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $C[$key]->pic = $pic[$key]->img1;    
                 }                          
        
          //转换json子串                            
            foreach ($D as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $D[$key]->pic = $pic[$key]->img1;    
                 }                          
    

      
                                                     
    	return view('homes.center.comment',['a'=>$A,'b'=>$B,'c'=>$C,'d'=>$D]);
    }

    public function add (Request $Request)
    {	
    	//订单id
    	$id = $Request->all()['id'];

    

    	$arr=DB::table('orders')->join('users','users.id','=','orders.sale_uid')
    							->join('goods','goods.id','=','orders.goods_id')
                                ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
    							->where('orders.id',$id)
    							->select('goods.title','orders.*','users.username','goodsdetail.pic','goodsdetail.content','goods.newprice')
    	       					->first();
		
        //转换json字符串
        $arr->pic = json_decode($arr->pic)->img1;

 
        return view('homes.center.addcomment',['arr'=>$arr,'oid'=>$id]);
    

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
        $arr['order_id'] = $id;
        $arr['comment'] = $res['content'];
        $arr['b_id'] = session('uid');      //评论的人是我
        $arr['s_id'] = $or->sale_uid;       //被评论的人是卖家
         
        $bool = Comment::create($arr);

        
        //添加消息   买家评论卖家 
        $res1['order_id'] = $id;
        $res1['msg_content'] = "买家评论了您";
        $res1['send_uid'] = session('uid');
        $res1['receive_uid'] = $or->sale_uid;

        $A = Message::create($res1);

        //修改订单状态()
        $order = DB::table('orders')->where('id',$id)->update(['buy_order_status'=>'5']);


    	 if($bool && $order && $A ){

    	 		DB::commit();
    	 
    	 		return redirect('/home/center/comment/index')->with('zcsg',"评论成功");

    	 }else{

    	 		DB::rollback();
    	 		return back();

    	 }


         
    }


    public function del (Request $Request)
    {
        $id = $Request->all()['id'];

        $bool=DB::table('comment')->where('id',$id)->delete();

        echo $bool;
    }
}
