<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Type;
use App\Http\Model\Typechild;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;
use DB;
use zgldh\QiniuStorage\QiniuStorage;

class xiugaidataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $res = Type::all();
        $reschild = Typechild::all();

        // $good = Good::where('id',$id)->first();
        // $good = Good::join('type','type.id','=','goods.type_id')
        //             ->join('typechild','typechild.id','=','goods.typechild_id')
        //             ->where('goods.id',$id)
        //             ->first();

         $good = Good::where('id',$id)->first();
         $goods=Goodsdetail::where('goods_id',$id)->first();
        $goodsdetail = $goods->content;

        $pic = $goods->pic;


        $img = json_decode($pic);

         // dd($img);

        return view('homes.center.xiugaidata',['res'=>$res,'reschild'=>$reschild,'good'=>$good,'goodsdetail'=>$goodsdetail,'img'=>$img]);
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
        $res = $request->except('_token','_method','content');

        $info = Good::where('id',$id)->update($res);

        if($info){
            return redirect('/home/center/myershou')->with('xgcg','修改成功');
        }else{
            return redirect('/home/center/myershou')->with('xgsb','修改失败');
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
        //
    }
}
