<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;

class ListTypeController extends Controller
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
        //商品子类
        $res = Good::where('typechild_id',$id)->where('status',1)->paginate(15);
        //商品详情的图片
        $pic = [];
        foreach ($res as $k => $v) {
            $goods_id = $v->id;
            $photo = Goodsdetail::where('id',$goods_id)->first()->pic;
            $photo = json_decode($photo)->img1;

            $pic[$goods_id] = $photo;
            
        }

        // 商品详情的描述
        $description = [];
        foreach ($res as $key => $val) {
            $goods_id = $val->id;
            $content = Goodsdetail::where('id',$goods_id)->first()->content;
            $description[$goods_id] = $content;
            
        }

        // dd($description);

      

        return view('homes.list.listtype',['res'=>$res,'pic'=>$pic,'description'=>$description]);


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
        //
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
