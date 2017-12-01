<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Model\Order_money;
use App\Http\Model\User;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use App\Http\Model\Type;
use App\Http\Model\Typechild;
use App\Http\Model\message;
use App\Http\Model\Comment;
use DB;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询收入总金额 
        $pay_money=Order_money::value('shouru');

        //查询进账订单信息
        $jin= Order::whereIn('buy_order_status', [2,3,4])->get();
        
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


        return view('admins.wallet.jinindex',['pay'=>$pay_money,'jin'=>$jin,'info'=>$info ,'inf'=>$inf,'in'=>$in]); 
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
        //查询出订单信息
        $res = Order::where('id',$id)->first();

        //商品价格
        $money = $res->pay_money + $res->pay_yunfei ;

        // 查询卖家id
        $sale_uid = $res->sale_uid;
        //查询买家id
        $buy_uid = $res->buy_uid;

        //
        $zhichu = Order_money::value('zhichu');

        $qianbao = User::where('id',$sale_uid)->value('money');

        $a = $zhichu+$money;

        $b = $qianbao+$money;
        // $c= DB::table('orders')->where('id',$id)->first();
        // dd($c->buy_order_status);
        // dd($user1);
        // 开启事务
        DB::beginTransaction();  
        try {  
                // 出账总金额加上商品价格 
                $user1 = DB::table('orders_money')->where('id',1)->update(['zhichu' =>$a]);
                // 卖家账户加上商品价格
                $user2 = DB::table('users')->where('id',$sale_uid)->update(['money'=> $b]);
                // 更改买家状态为待评价
                $c= DB::table('orders')->where('id',$id)->update(['buy_order_status' => '4']);
                //更改卖家状态为待评价
                $d= DB::table('orders')->where('id',$id)->update(['sale_order_status'=> '4']);
                //给买卖家发送消息 
                $e= message::create(['msg_content'=>'买家交易超时,系统自动打款给您!','send_uid'=>'0','receive_uid'=>$sale_uid,'order_id'=>$id]);
              
             $f= message::create(['msg_content'=>'买家交易超时,系统自动打款给卖家!','send_uid'=>'0','receive_uid'=>$buy_uid,'order_id'=>$id]);  


                    if( $user1 && $user2 && $c && $d && $e && $f){  
                            DB::commit(); 
                            return redirect('/admin/wallet');
                        
                    }else{
                        // return redirect('404');
                        return 1;
                    }

            } catch (\Exception $e) {  
                DB::rollBack();  
                return redirect('404');  
            }  
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //查询出订单信息
        $res = Order::where('id',$id)->first();

        //商品价格
        $money = $res->pay_money + $res->pay_yunfei ;

        // 查询卖家id
        $sale_uid = $res->sale_uid;
        //查询买家id
        $buy_uid = $res->buy_uid;

        //
        $shouru = Order_money::value('shouru');

        $qianbao = User::where('id',$buy_uid)->value('money');

        $a = $shouru-$money;

        $b = $qianbao+$money;

        // dd($user1);
        // 开启事务
        DB::beginTransaction();  
        try {  
                // 出账总金额加上商品价格 
                $user1 = DB::table('orders_money')->where('id',1)->update(['shouru' => $a]);
                // 买家账户加上商品价格
                $user2 = DB::table('users')->where('id',$buy_uid)->update(['money'=> $b]);
                // 更改买家状态为待评价
                $c= DB::table('orders')->where('id',$id)->update(['buy_order_status' => '4']);
                //更改卖家状态为待评价
                $d= DB::table('orders')->where('id',$id)->update(['sale_order_status'=> '4']);
                

                $e= message::create(['msg_content'=>'卖家交易超时,系统自动打款给您!','send_uid'=>'0','receive_uid'=>$buy_uid,'order_id'=>$id]);
                $f= message::create(['msg_content'=>'卖家交易超时,系统自动打款给买家!','send_uid'=>'0','receive_uid'=>$sale_uid,'order_id'=>$id]);  


                    if( $user1 && $user2 && $c && $d && $e && $f){  
                            DB::commit(); 
                            return redirect('/admin/wallet');
                        
                    }else{
                        // return redirect('404');
                        return  1;
                    }

            } catch (\Exception $e) {  
                DB::rollBack();  
                return redirect('404');  
            }  
    }
}
