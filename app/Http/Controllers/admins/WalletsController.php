<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Model\Order_money;

class WalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询支出总金额 
        $pay=Order_money::value('zhichu');

        //查询出账订单信息
        $chu=Order::whereIn('buy_order_status', [5,6,7])->get();
        
        //多表联查买家手机号
        $info = Order::join('users',function($join){
            $join->on('users.id','=','orders.buy_uid');
        })->get();
        // dd($info);


        //多表联查卖家手机号
        $inf = Order::join('users',function($join){
            $join->on('users.id','=','orders.sale_uid');
        })->get();

        //多表联查商品标题
        $in = Order::join('goods','goods.id','=','orders.goods_id')->get();

        return view('admins.wallet.chuindex',['pay'=>$pay,'chu'=>$chu,'info'=>$info ,'inf'=>$inf,'in'=>$in]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
