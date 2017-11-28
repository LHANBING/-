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
use DB;
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
        //所有订单
        //获取当前登陆者id
        $id = session('uid');

        // $zong = Order::where('sale_uid',$id)->get();
        // $goods_id=[];
        // foreach($zong as $k=>$z){
        //     $goods_id[]=$z->id;
        // }

        // $good = Good::whereIn('id',$goods_id)->get();

        // dd($good);
        $st=[1,2,3,4];
        $zong = Order::join('goods','goods.id','=','orders.goods_id')
        ->join('type','type.id','=','goods.type_id')
        ->join('typechild','typechild.id','=','goods.typechild_id')
        ->where('sale_order_status','<',6)
        ->where('sale_uid',$id)
        ->get();

        $pic= [];
        $arr = Order::where('sale_uid',$id)->get();

        // dd($arr);
        foreach($arr as $k=>$v){
            $goods_id= $v->goods_id;
            $img = Goodsdetail::where('goods_id',$goods_id)->first()->pic;
            $img = json_decode($img);
            $pic[$goods_id]=$img->img1;
        }

        // dd($pic);

        // dd($zong);



        //待付款
        $daifukuan = Order::join('goods','goods.id','=','orders.goods_id')
        ->join('type','type.id','=','goods.type_id')
        ->join('typechild','typechild.id','=','goods.typechild_id')
        ->where(['sale_order_status'=>1,'sale_uid'=>$id])
        ->get();

        // $dfkid = Order::where(['buy_order_status'=>1,'sale_uid'=>$id])->select('id')->get();
        // dd($dfkid);

        //待发货
        $daifahuo = Order::join('goods','goods.id','=','orders.goods_id')
        ->join('type','type.id','=','goods.type_id')
        ->join('typechild','typechild.id','=','goods.typechild_id')
        ->where(['sale_order_status'=>2,'sale_uid'=>$id])
        ->get();

        // $dfhid = Order::where(['buy_order_status'=>2,'sale_uid'=>$id])->select('id')->get();
        // dd($daifukuan);

        //待收货
        $daishouhuo = Order::join('goods','goods.id','=','orders.goods_id')
        ->join('type','type.id','=','goods.type_id')
        ->join('typechild','typechild.id','=','goods.typechild_id')
        ->where(['sale_order_status'=>3,'sale_uid'=>$id])
        ->get();
        

        //待评价
        $daipingjia = Order::join('goods','goods.id','=','orders.goods_id')
        ->join('type','type.id','=','goods.type_id')
        ->join('typechild','typechild.id','=','goods.typechild_id')
        ->where(['sale_order_status'=>4,'sale_uid'=>$id])
        ->get();

        return view('homes.center.maiOrder',['zong'=>$zong,'pic'=>$pic,'daifukuan'=>$daifukuan,'daifahuo'=>$daifahuo,'daishouhuo'=>$daishouhuo,'daipingjia'=>$daipingjia]);
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

    public function quxiao(Request $request)
    {
        $num = $request->only('num');
        $status=Order::where('order_num',$num)->update(['buy_order_status'=>0,'sale_order_status'=>0]);

        if($status){
            return 1 ; 
        }else{
            return 0 ;
        }
    }


    //物流
    public function wuliu(Request $request)
    {
        // $res = ($request->only('num'));
         $res = $_GET['num'];

         // dd($res);

        return view('homes.center.wuliu',['res'=>$res]);
    }


    //上传物流
     public function dowuliu(Request $request)
    {
        $res = $request->except('_token');
        // var_dump($res);die;
        // $a = ;
        // $b = ;
        // $c = ;

        // var_dump($a);die;
        $status=Order::where('order_num',$res['num'])
        ->update(['kuaidi_ltd'=>$res['kuaidi'],'kuaidi_num'=>$res['danhao'],'buy_order_status'=>3,'sale_order_status'=>3]);
         // dd($re->num);
        if($status){
            return 1 ; 
        }else{
            return 0 ;
        }
         
    }


     public function pingjia(Request $request)
    {
        $res = $request->except('_token');
        $num = $res['num'];
        $text = $res['text'];

        $uid = session('uid');

        $b=Order::where('order_num',$num)->first();
        $buy_id = $b->buy_id;

        $order_id = $b->id;

        $a = DB::table('comment')->insertGetid(['comment'=>$text,'order_id'=>$order_id,'b_id'=>$uid,'s_id'=>$buy_id]);


        if($a){
            $c= Order::where('order_num',$num)->update(['sale_order_status'=>5]);
            if($c){
                return 1 ; 
            }else{
                return 2 ;
            }
        }else{
            return 0;
        }
        // return ;

        
    }
        
        
}
