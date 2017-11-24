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
    
        $a= DB::table('message')->where('receive_uid',10)->where('mes_status','0')->count(); 
    	return view('homes.index',['type'=>$type,'typechild'=>$typechild,'goods'=>$goods,'a'=>$a]);
    }

}
