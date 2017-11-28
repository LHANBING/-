<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use DB;
class RechargeController extends Controller
{   

    /**
     * 进入充值页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('homes.center.user_recharge');
    }


    /**
     * 处理充值信息
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dorecharge(Request $request)
    {	  
        //获取存在session中的uid
    	$id  = session('uid');
        //获取用户充值的金额 
    	$money = $request->input('money');
        // 开启事务处理
    	DB::beginTransaction();
        // 更新用户的金额
    	$res = DB::update('update users set money = money +'.$money.' where id = '.$id);
        // 判断更新是否成功
    	if($res)
    	{   
            // 更新成功 并返回ajax的值
    		DB::commit();
    		echo 1;
    	}else
    	{   //更新失败 并返回ajax的值
    		DB::rollback();
    		echo 0 ;
    	}
    }
}
