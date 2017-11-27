<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;
use App\Http\Model\Goodsdetail;

class ListDetailController extends Controller
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
        //将goods_id转换为整型
        $id = (int)$id;
        //获取该条商品的信息和详细信息
        $goods = Good::find($id);
        $goodsdetail = Goodsdetail::find($id);
        //操作json字符串的图片信息
        $goods_photo = $goodsdetail->pic;
        $goods_photo = json_decode($goods_photo);
        // dd($goods_photo);

        //获得json图片对象长度
            $length = 0;
        foreach ($goods_photo as $k => $v) {
            $length++;
        }

        return view('homes.list.listdetail',['goods'=>$goods,'goodsdetail'=>$goodsdetail,'goods_photo'=>$goods_photo,'length'=>$length]);
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
