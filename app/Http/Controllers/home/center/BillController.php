<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use App\Http\Model\Order;
use App\Http\Model\Good;
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
        $sale = DB::select('select * from orders where sale_uid ='.$id.' and sale_order_status > 3');
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
        $sale = DB::table('orders')
                ->join('users','orders.sale_uid','=','users.id')
                ->join('goods','goods_id','=','goods.id')
                ->where('sale_order_status','>','3')
                ->select('orders.*','goods.goods_photo','goods.title')
                ->where('users.id',$id)
                ->get();

        if($sale != false)
        {   
            //用户收入的金额 
            $sum = 0;
            foreach ($sale as $key => $value) 
            {
                $sum = $sum + $value->pay_money;
            }
            return view('homes.center.billlistin',['sale'=>$sale,'sum'=>$sum]);
        }else
        {    //用户收入的金额
             $sum = 0;
            return view('homes.center.billlistin',['sale'=>$sale,'sum'=>$sum]);
        }
    	
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
        // 用户支出的信息
        $buy = DB::table('orders')
                ->join('users','orders.buy_uid','=','users.id')
                ->join('goods','goods_id','=','goods.id')
                ->where('buy_order_status','>','1')
                ->select('orders.*','goods.goods_photo','goods.title')
                ->where('users.id',$id)
                ->get();

        if($buy != false)
        {   
            //用户支出的金额 
            $sum = 0;
            foreach ($buy as $key => $value) 
            {   
                               
                $sum = $sum + $value->pay_money + $value->pay_yunfei;
            }
            return view('homes.center.billlistout',['buy'=>$buy,'sum'=>$sum]);
        }else
        {    //用户收入的金额
             $sum = 0;
            return view('homes.center.billlistout',['buy'=>$buy,'sum'=>$sum]);
        }
    	
    }
}
