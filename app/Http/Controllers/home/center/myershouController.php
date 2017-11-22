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
use session;


class myershouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //获取登陆者的id
        $id = session('uid');
        // dd($id);
        //联合查询goods表+users表+type表+typechild表
        $res = Good::join('users','users.id','=','goods.user_id')
                   ->join('type','type.id','=','goods.type_id')
                   ->join('typechild','typechild.id','=','goods.typechild_id')
                   ->where('users.id',$id)
                   ->get();
        // dd($res);

        $ress = Good::where('user_id',$id)->get();    
        // $ress = Good::where('user_id',$id)->get();   

        // dd($ress); 
        return view('homes.center.myershou',['res'=>$res,'ress'=>$ress]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            return 1;
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
            return 2;
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
            return 3;
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
            return 4;
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
            return 5;
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
        $a = Good::where('id',$id)->delete();

        $b = Goodsdetail::where('goods_id',$id)->delete();

        if($a ){
            return $data = [
                'status'=> 1,
                'info'=>'删除成功'
            ];
        }else{
            return $data = [
                'status'=> 0,
                'info'=>'删除失败'
            ];
        }
    }








    //下架功能
    public function xiajia($id)
    {   

        // echo $id; die;
        $status = Good::where('id',$id)->update(['status'=>0]); 
        // return $status;
        // dd($status);
        if($status){
            return 1;
        }else{
            return 0;
        }
    }
    //上架功能
    public function shangjia($id)
    {   

        // echo $id; die;
        $status = Good::where('id',$id)->update(['status'=>1]); 
        // return $status;
        // dd($status);
        if($status){
            return 1;
        }else{
            return 0;
        }
    }
}
