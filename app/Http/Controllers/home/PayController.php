<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use App\Http\Model\Order;
use App\Http\Model\Useraddress;
use App\Http\Model\Collect;
use Session;
use DB;

class PayController extends Controller
{
    //进入结算页面
    public function gopay()
    {

        //用户id
        $user_id = session('uid');
        //获得用户地址
        $address = Useraddress::where('user_id',$user_id)->get();
        // dd($address);

        $default = Useraddress::where('user_id',$user_id)
                    ->where('status',1)
                    ->first();
        // dd($default);
       /* echo '<pre>';
        var_dump($address);die;*/

        $id = $_GET['goods_id'];



         //获取该条商品的信息和详细信息
        $goods = Good::find($id);
        // dd($goods);
        $goodsdetail = Goodsdetail::find($id);
        //操作json字符串的图片信息
        $goods_photo = $goodsdetail->pic;
        $goods_photo = json_decode($goods_photo);
        // dd($goods_photo);
        


    	return view('homes.pay.gopay',['goods'=>$goods,'goods_photo'=>$goods_photo,'address'=>$address,'default'=>$default]);
    }
    //订单生成进入付款页面
    public function pay(Request $request)
    {
        // var_dump(Good::where('id',$goods_id)->first()->user_id);die;
        //获取数据
    	$res = $request->except('_token');
       /* array:4 [▼
              "buy_message" => "快快滴"
              "pay_money" => "2310"
              "pay_yunfei" => "10"
              "goods_id" => "7"
              "address" => "1"
            ]*/
            
            $goods_id = $res['goods_id'];
            //修改商品状态status变为0
            Good::where('id', $goods_id)->update(['status' => 0]);
            //生成订单号
            $res['order_num'] = time();  //1511599648
            //获取买家id
            $res['buy_uid'] = session('uid');
            //获取卖家id
            $res['sale_uid'] = Good::where('id',$goods_id)->first()->user_id;
            //买家订单状态
            $res['buy_order_status'] = 1;
            //卖家订单状态
            $res['sale_order_status'] = 1;

            $order = Order::create($res);

            $order_id = $order->id;




        return view('homes.pay.pay',['order_id'=>$order_id]); 
    }
    //确认付款
    public function overpay()
    {
        //获取订单号
        $order_id = $_GET;

        $order_id = $order_id['order_id'];

        $arr = [];
        //填写完整订单状态
        $arr['buy_order_status'] = 2;
        $arr['sale_order_status'] = 2;
        $arr['pay_time'] = time();

        $res = Order::where('id',$order_id)->update($arr);

        $comein = Order::where('id',$order_id)->first()->pay_money;
        //获取收入字段并
        $money = DB::table('orders_money')->find(1)->shouru;

         $res1 = DB::table('orders_money')->update(['shouru' => $money+$comein]);

        if ($res && $res1) {
            return redirect('/home/center/order/index');
        } else {
            return back();
        }
    }

    public function default()
    {
        //获取要修改默认地址id
        $id = $_POST['id'];
        // $res = Useraddress::update(['status'=>0]);
        // 改变所有地址为非默认
        $res = DB::table('useraddress')->where('id','>','0')->update(['status'=>'0']);
        if ($res) {
            //改变要修改的默认地址状态
            $res1 = DB::table('useraddress')->where('id',$id)->update(['status'=>'1']);
            if ($res1) {
                echo 'yes';   
            }
        } else {
            echo 'no';
        }
    }

    //删除地址信息
    public function del()
    {
        $id = $_POST['id'];
        $res = Useraddress::destroy('id',$id);
        if ($res) {
            return 'yes';
        } else {
            dd($res);
        }
    }

     //修改地址信息
    public function edit(Request $request)
    {
        $id = $request->only('id');
        $id = $id['id'];
        $address = Useraddress::find($id);
        return view('homes.pay.edit',['address'=>$address]);
    }

    public function doedit(Request $request)
    {
        
                $city = $request->input('city');
                $res = $request->except('_token','city');
                $id = $res['id'];
                //从文件中读取数据到PHP变量
                $json_string = file_get_contents('./homes/city/script/list.json');
                     
                // 把JSON字符串转成PHP数组
                $data = json_decode($json_string, true);
                 
                if($city != false)
                {
                    $res['city']  = $data[$city];
                }else
                {
                    $res['city']  = $city;
                }
                $res['province'] = $data[$res['province']];    
                $res['area'] = $data[$res['area']];

                $info3 =Useraddress::where('id',$id)->update($res);
                    
                    if($info3)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }

        // $arr = $request->except('_token');
        // $id = $arr['id'];
        // // $address = Useraddress::($id);
        // $res = DB::table('useraddress')->where('id',$id)->update($arr);
        // if ($res) {
        //     echo 1;
        // }
    }

    //添加地址信息
    public function add()
    {
        
        return view('homes.pay.add');
    }

    public function doadd(Request $request)
    {

        //取city 看是否是直辖市
        $city = $request->input('city');
                $res = $request->except('_token','city');
                //从文件中读取数据到PHP变量
                $json_string = file_get_contents('./homes/city/script/list.json');
                     
                // 把JSON字符串转成PHP数组
                $data = json_decode($json_string, true);
                 
                if($city != false)
                {
                    $res['city']  = $data[$city];
                }else
                {
                    $res['city']  = $city;
                }
                $res['province'] = $data[$res['province']];    
                $res['area'] = $data[$res['area']];
                //添加user_id
                $res['user_id'] = session('uid');
                $info3 =Useraddress::create($res);
                    
                    if($info3)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }
      /*  
        $arr = $request->except('_token');

        // $address = Useraddress::($id);
        $res = DB::table('useraddress')->where('id',$id)->update($arr);
        if ($res) {
            echo 1;
        }*/
    }



    //收藏商品
    public function collect(Request $request)
    {
        //获取goods_id
        // $goods_id =(int)$request->only('id');
        $goods_id =$request->all()['id'];

        //判断是否登录,登录可收藏
        $user_id = session('uid');
        if ($user_id) {
            $collect = Collect::where(['user_id'=>session('uid'),'goods_id'=>$goods_id])->first();
            //判断该商品是否已被用户收藏
            if ($collect) {
                $res = Collect::where(['user_id'=>session('uid'),'goods_id'=>$goods_id])->delete();
                if ($res) {
                     return 3;
                }
               
            } else {
                 

                $arr = [];
                $arr['goods_id'] = $goods_id;
                $arr['user_id'] = $user_id;

                 $res = Collect::create($arr);
                //存入数据库成功
                if ($res) {
                    return 1;

                } else {
                    return 0;
                }

            }

        } else {
             echo 2;
     }

 }

}
