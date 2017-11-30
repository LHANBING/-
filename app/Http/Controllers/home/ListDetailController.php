<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use App\Http\Model\User;
use App\Http\Model\Order;
use App\Http\Model\Comment;
use App\Http\Model\Collect;
use Session;

class ListDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        //将goods_id转换为整型
        // $id = (int)$id;//
        // dd($id);
        //获取卖家足迹信息
        //获取卖家已成交商品
        $res = Good::join('orders','orders.sale_uid','=','goods.user_id')->where(['goods.id'=>$id,'sale_order_status'=>5])->get();
        // dd($res);

        //分页
        //$users = DB::table('users')->paginate(15);
        $page = Good::join('orders','orders.sale_uid','=','goods.user_id')->where(['goods.id'=>$id,'sale_order_status'=>5])->paginate(2);

        // dd($page);
        //获取已成交商品信息
        $goodsid = [];
        //获取完成订单的id
        $orderid = [];
        foreach($res as $k=>$v){
            $goodsid[$k] = Good::find($v->goods_id);
            $orderid[$k] = ['order_id'=>$v->id,'sale_uid'=>$v->sale_uid];
        }
        // dd($orderid);
        // dd($goodsid);

        //获取成交商品图片
        $commentpic = [];
        //获得成交商品的详情介绍
        $commentcontent = [];
        foreach ($goodsid as $k => $val) {

            $goodsdetail = Goodsdetail::find($val->id);
            //操作json字符串的图片信息
            $goods_photo = $goodsdetail->pic;
            $goods_photo = json_decode($goods_photo);
            $commentpic[$k] = $goods_photo;
            $commentcontent[$k] = $goodsdetail->content;
        }
        // dd($commentcontent);
        // dd($commentpic);


        // dd($orderid);
        //获得买家评论
        $buysay = [];
         //获得卖家回复
        $salesay = [];
        foreach($orderid as $k=>$v){
            //获取一个值，看看空不空 ，不空则继续 获得所有
             $buyone = Comment::where(['s_id'=>$v['sale_uid'],'order_id'=>$v['order_id']])->select('comment')->first();
             // dd($buyone);
             if ($buyone) {
                $buy = Comment::where(['s_id'=>$v['sale_uid'],'order_id'=>$v['order_id']])->select('comment')->get();
                $buysay[$k] = $buy[$k]->comment;
            }
            $saleone = Comment::where(['b_id'=>$v['sale_uid'],'order_id'=>$v['order_id']])->select('comment')->first();
            if ($saleone) {
                $sale = Comment::where(['b_id'=>$v['sale_uid'],'order_id'=>$v['order_id']])->select('comment')->get();
                $salesay[$k] = $sale[$k]->comment;
            }
          
            
        }
        // dd($buysay);
        // dd($salesay);
       

        //获取卖家qq号
        $qq = Good::join('users','users.id','=','goods.user_id')
                    ->where('goods.id',$id)
                    ->first()
                    ->qq;

/*
        $qq = Good::where('id',$id)->select('user_id')->first()->user_id;
        $qq = User::where('id',$qq)->select('qq')->first()->qq;*/
        // var_dump($qq);die;

        //获取该条商品的信息和详细信息
        $goods = Good::find($id);

        // dd($goods);
        $goodsdetail = Goodsdetail::find($id);
        //操作json字符串的图片信息
        $goods_photo = $goodsdetail->pic;
        $goods_photo = json_decode($goods_photo);
        // dd($goods_photo);

        //获得json图片对象长度
            $length = 0;
        foreach ($goods_photo as $k => $v) {
            $length++;
        }



        //检测商品是否被收藏
        if (session('uid')) {
            // dd(session('uid'));
            // dd($id);
            $collect = Collect::where(['user_id'=>session('uid'),'goods_id'=>$id])->first();
            // dd($collect);
            return view('homes.list.listdetail',['goods'=>$goods,'goodsdetail'=>$goodsdetail,'goods_photo'=>$goods_photo,'length'=>$length,'qq'=>$qq,'goodsid'=>$goodsid,'commentpic'=>$commentpic,'commentcontent'=>$commentcontent,'buysay'=>$buysay,'salesay'=>$salesay,'page'=>$page,'collect'=>$collect]);
        } else {
            return view('homes.list.listdetail',['goods'=>$goods,'goodsdetail'=>$goodsdetail,'goods_photo'=>$goods_photo,'length'=>$length,'qq'=>$qq,'goodsid'=>$goodsid,'commentpic'=>$commentpic,'commentcontent'=>$commentcontent,'buysay'=>$buysay,'salesay'=>$salesay,'page'=>$page]);
    }
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

    public function collect()
    {

    }
}
