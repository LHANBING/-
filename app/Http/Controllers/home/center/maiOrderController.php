<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use App\Http\Model\Type;
use App\Http\Model\Typechild;
use App\Http\Model\Order;
use session;

class maiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = session('uid');

        // $zong = Order::where('sale_uid',$id)->get();
        // $goods_id=[];
        // foreach($zong as $k=>$z){
        //     $goods_id[]=$z->id;
        // }

        // $good = Good::whereIn('id',$goods_id)->get();

        // dd($good);

        $zong = Order::join('goods','goods.id','=','orders.goods_id')
        ->where('sale_uid',$id)
        ->select('orders.order_num','orders.created_at','orders.pay_money','orders.pay_yunfei','goods.title')
        ->get();

        // dd($zong);
        return view('homes.center.maiOrder',['zong'=>$zong]);
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
