<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use App\Http\Model\Collect;
use Session;

class CollectionController extends Controller
{
    public function index ()
    {
    	//收藏的未下架商品
    	$user_id = Session('uid');
    	//收藏的未下架商品
    	$good = Collect::join('goods','collect.goods_id','=','goods.id')->where(['collect.user_id'=>$user_id,'goods.status'=>1])->get();
    	// dd($goods);
    	//获得未下架商品图片
    	$goodpic = [];
    	foreach ($good as $k => $v) {
    		$picdetail = Goodsdetail::find($v->id);
    		$re = json_decode($picdetail->pic);
            $goodpic[$v->id] = $re->img1;
    	}


    	//收藏的已下架商品
    	$goods = Collect::join('goods','collect.goods_id','=','goods.id')->where(['collect.user_id'=>$user_id,'goods.status'=>0])->get();
    	//获得下架商品图片
    	$goodspic = [];
    	foreach ($goods as $k => $v) {
    		$picdetail = Goodsdetail::find($v->id);
    		$re = json_decode($picdetail->pic);
            $goodspic[$v->id] = $re->img1;
    	}
    	// dd($goodspic);

    	return view('homes.center.collection',['good'=>$good,'goodpic'=>$goodpic,'goods'=>$goods,'goodspic'=>$goodspic]);
    }

    public function del(Request $request)
    {
    	// echo 132;
    	$goods_id = $request->only('id')['id'];
    	$user_id = session('uid');

    	$res = Collect::where(['user_id'=>$user_id,'goods_id'=>$goods_id])->delete();

    	if ($res) {
    		echo 1;
    	}

    } 

}
