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

class fabuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Type::all();
        $reschild = Typechild::all();
        return view('homes.center.fabuershou',['res'=>$res,'reschild'=>$reschild]);
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

        // var_dump($request->all());die;
        if($request->hasFile('goods_photo')){

            //修改名字
            $name = rand(1111,9999).time();
            //获取后缀
            $suffix = $request->file('goods_photo')->getClientOriginalExtension();
            //移动图片
            $request->file('goods_photo')->move('./Uploads',$name.'.'.$suffix);

        }

        $res = $request->except('_token','goods_photo','content');

        $res['goods_photo'] = '/Uploads/'.$name.'.'.$suffix;
        $res['user_id'] = session('uid');

        $data = Good::create($res);

        //添加goods_detail表数据
        $detail = $request->only('content');

        if ($data) {

            $good = DB::table('goods')
            ->orderBy('id','desc')
            ->first();

            $goods_id = $good->id;

            $detail['goods_id'] = $good->id;
            // var_dump($detail);die;

            $res = Goodsdetail::create($detail);

            if ($res) {
                 return redirect('/home/center/fabu');
             }else{
                return back()->withInput();
                 }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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

    public function type(Request $request)
    {
        
        $id = $request->except('_token');
        $res = Typechild::where('type_id',$id)
        ->where('status','1')
        ->get();
        echo json_encode($res);
    }

}
