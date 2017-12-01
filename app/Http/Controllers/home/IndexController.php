<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Type;
use App\Http\Model\Typechild;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use App\Http\Model\User;
use App\Http\Model\Friendlink;
use Session;
use Cookie;
use DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {

    $asd = DB::table('config')->where('id',1)->first();

    $qwe = $asd->config;

if($qwe){

    //获取前台允许显示的父类信息
        $type = Type::where('status',1)->get();
        //获取前台允许显示的子类信息
        $typechild = Typechild::where('status',1)->get();
        //获取所有商品的数量
        $count = Good::count();
        // $count = Goodsdetail::count();
        //获取所有商品的id
        $list = DB::table('goods')->where('status',1)->lists('id');
        //将商品id的数组打乱
        $lists = shuffle($list);
        //取出数组中的5条数据
        $res = array_slice($list,0,10);
        //获取随机获取的商品信息
        $goods = Good::whereIn('id',$res)->get();
        //获取随机获取的商品的详细信息
        $goodsdetail = Goodsdetail::whereIn('id',$res)->get();
        //定义存放图片的数组
        $goods_photo = [];
        foreach ($goodsdetail as $k => $v) {
            //将json字符串编码
            $re = json_decode($v->pic);
            $goods_photo[$v->id] = $re->img1;
        }

        //用户信息
        $user = User::where('id',session('uid'))->first();
        
        // dd($user->username);die;
        
        //获取友情链接
        $link = Friendlink::where('status',1)->get();
        // dd($link);


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
        $num = $a + $b;           
        //dd($num);        
        return view('homes.index',['type'=>$type,'typechild'=>$typechild,'goods'=>$goods,'goods_photo'=>$goods_photo,'num'=>$num,'user'=>$user,'link'=>$link]);
}else{
    return redirect(404);
}

        

        
    
    }


    public function search(Request $request)
    {


        $searchlist = Good::where('title','like','%'.$request->only('search')['search'].'%')->where('status',1)->lists('id');

            //获取的商品信息
        $goods = Good::whereIn('id',$searchlist)->where('status',1)->paginate(15);

         if (!empty($goods[0])) {
        // dd($goods);
        // $goods = Good::whereIn('id',$searchlist)->where('status',1)->get();

         //获取的商品的详细信息
        $goodsdetail = Goodsdetail::whereIn('id',$searchlist)->get();

        //定义存放图片的数组
        $goods_photo = [];
        foreach ($goodsdetail as $k => $v) {
            //将json字符串编码
            $re = json_decode($v->pic);
            $goods_photo[$v->id] = $re->img1;
        }

        return view('homes.search',['goods'=>$goods,'goods_photo'=>$goods_photo]);

    } else {
        return view('homes.search',['goods[0]'=>$goods]);
    }


    }


}










