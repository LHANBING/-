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


        $res = $request->except('_token','content','pic');
        $ress = $request->all();
        // dd($ress);
        if($ress['pic']){

            $res['user_id'] = session('uid');

            $res['goodsbianhao']=date('Ymd',time()).rand(100000,999999);

            $data = Good::create($res);
        
             //添加goods_detail表数据
            $detail = $request->only('content','pic');
            $detail['goods_id'] = $data->id;
            
            
            $info = Goodsdetail::insertGetId($detail);

            if ($info) {
                //返回前台发布成功
                 return redirect('/home/center/myershou')->with('fbcg','发布成功');
             }else{
                // 返回前台发布失败,让他重试 
                return back()->withInput()->with('fbsb','发布失败,请重试!');
                // return back()->withInput();
             }

        }else{
            //返回前台 滚回去上传图片
            return back()->withInput()->with('sctp','请上传图片后重试');
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
        // return 1 ;
    }

    //多图上传ajax方法
    public function uploadimg(Request $request){
        //实例化disk
        $disk = QiniuStorage::disk('qiniu');

        //获取图片文件信息
        $file = $request->file('file');

        //获取后缀
        $suffix = $file->getClientOriginalExtension();

        //拼装新的图片名称
        $fileName = time().rand(100000,999999).'.'.$suffix;

        //存进七牛
        $bool=$disk->put('goods/'.$fileName,file_get_contents($file->getRealPath())); 

        //返回文件名称
        return $fileName;
    }

}
