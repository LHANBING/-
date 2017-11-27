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
        /*$res = Goodsdetail::find(16);
        $res = rtrim($res->pic);
        // dd($res);
         $ress = json_decode($res);
        dd($ress);die;*/

        //获取前台允许显示的父类信息
    	$type = Type::where('status',1)->get();
        //获取前台允许显示的子类信息
        $typechild = Typechild::where('status',1)->get();
        //获取所有商品的数量
        $count = Good::count();
        // $count = Goodsdetail::count();
        //获取所有商品的id
        $list = DB::table('goods')->lists('id');
        //将商品id的数组打乱
        $lists = shuffle($list);
        //取出数组中的5条数据
        $res = array_slice($list,1,10);
        //获取随机获取的商品信息
        $goods = Good::whereIn('id',$res)->get();
        //获取随机获取的商品的详细信息
        $goodsdetail = Goodsdetail::whereIn('id',$res)->get();
        //定义存放图片的数组
        $goods_photo = [];
        foreach ($goodsdetail as $k => $v) {
            //将json字符串编码
            $re = json_decode($v->pic);
            $goods_photo[$v->id] = $re->img1;
        }

    	return view('homes.index',['type'=>$type,'typechild'=>$typechild,'goods'=>$goods,'goods_photo'=>$goods_photo]);
    
        
    }

}










