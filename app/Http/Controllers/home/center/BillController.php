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
    public function index ()
    {   
        $id = session('uid');
        $user_info = User::where('id',$id)->first();
        $money = $user_info['money'];
        $sale = DB::select('select * from orders where sale_uid ='.$id.' and sale_order_status = 5');
        $buy = DB::select('select * from orders where buy_uid ='.$id.' and buy_order_status = 5');

        return view('homes.center.bill',['money'=>$money,'sale'=>$sale,'buy'=>$buy]);
       
    }

    public function in ()
    {   
        
    	return view('homes.center.billlistin');
    }

    public function out ()
    {
    	return view('homes.center.billlistout');
    }
}
