<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use App\Http\Model\Order;
use App\Http\Model\Good;
use App\Http\Model\goodsdetail;
use DB;
class BillController extends Controller
{   
    /**
     * 显示账单明细页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {   
        // 在session获取uid
        $id = session('uid');
        // 查询用户的个人信息
        $user_info = User::where('id',$id)->first();
        // 用户的余额
        $money = $user_info['money'];
        // 用户是否有收入
        $sale = DB::select('select * from orders where sale_uid ='.$id.' and sale_order_status > 3 ');
        // 用户是否有支出
        $buy = DB::select('select * from orders where buy_uid ='.$id.' and buy_order_status > 1');

        return view('homes.center.bill',['money'=>$money,'sale'=>$sale,'buy'=>$buy]);
       
    }
    /**
     * 显示用户收入详情页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function in ()
    {   
        // 在session获取uid
        $id = session('uid');
        // 用户收入的信息
        // 获取用户卖出商品的订单信息
        
        //获取购买所有商品订单信息
        $goods = Order::where('sale_uid',$id)->get();

        //获取商品详情
        
        //存放商品图片
        $pics = [];
        //存放商品名称
        $name = [];
        $sum = 0;

        foreach ($goods as $k => $v) {
            //获得商品id
            $goods_id = $v->goods_id;
            //获得title
            $name[$k] = Good::where('id',$goods_id)->first()['title'];
            //获得图片
            $goodsdetail = goodsdetail::where('id',$goods_id)->first();
            $pic = json_decode($goodsdetail->pic)->img1; 
            $pics[$k] = $pic;
            $sum += $v->pay_money + $v->pay_yunfei;
        }
                                                 // 用户支出的信息
        return view('homes.center.billlistin',compact('goods','pics','sum','name'));
    	
    }

    /**
     * 显示用户支出详情页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function out ()
    {   
        // 在session获取uid
        $id = session('uid');

        //获取购买所有商品订单信息
        $goods = Order::where('buy_uid',$id)->get();

        //获取商品详情
        
        //存放商品图片
        $pics = [];
        //存放商品名称
        $name = [];
        $sum = 0;

        foreach ($goods as $k => $v) {
            //获得商品id
            $goods_id = $v->goods_id;
            //获得title
            $name[$k] = Good::where('id',$goods_id)->first()['title'];
            //获得图片
            $goodsdetail = goodsdetail::where('id',$goods_id)->first();
            $pic = json_decode($goodsdetail->pic)->img1; 
            $pics[$k] = $pic;
            $sum += $v->pay_money + $v->pay_yunfei;
        }
                                                 // 用户支出的信息
        return view('homes.center.billlistout',compact('goods','pics','sum','name'));
       
    }
}
