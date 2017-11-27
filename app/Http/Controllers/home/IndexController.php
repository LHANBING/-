<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Type;
use App\Http\Model\Typechild;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use Session;
use Cookie;
use DB;

class IndexController extends Controller
{
    public function index()
    {
    	$type = Type::where('status',1)->get();
        $typechild = Typechild::where('status',1)->get();
        $count = Good::count();
        $list = DB::table('goods')->lists('id');
        $lists = shuffle($list);
        $res = array_slice($list,1,5);
        $goods = Good::whereIn('id',$res)->get();
    
        //这是出售消息 
        $b = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                    ->where('orders.sale_uid','=',session('uid'))
                                    ->where('mes_status','0')
                                    ->count();  
        //这是购买消息   
        $a = DB::table('message')->join('orders','orders.id','=','message.order_id')
                                 ->where('orders.buy_uid','=',session('uid'))
                                 ->where('mes_status','0') 
                                 ->count();                             

        $num = $a + $b;           
        //dd($num);                 
        
    	return view('homes.index',['type'=>$type,'typechild'=>$typechild,'goods'=>$goods,'num'=>$num]);
    }

}
