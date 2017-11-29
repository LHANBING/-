<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Model\Adv;
class AdvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $res = DB::table('advs')->get();
        // var_dump($request->all());
        //
        $res = DB::table('advs')->
        where('advs_a','like','%'.$request->input('search').'%')
            ->
        paginate($request->input('number',5));

        return view('admins.advs.index',['res'=>$res]); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.advs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
        'advs_a' => 'required',
        
        'advs_v' => 'required'
       
    ],[

        'advs_a.required'=>'友情链接名称不能为空！',
        

        'advs_v.required'=>'友情链接描述不能为空！',
        

    ]);

        //文件上传
        if($request->hasFile('advs_s')){
            //修改名字
            $name = rand(1111,9999).time();

            //修改后缀
            $suffix = $request->file('advs_s')->getClientOriginalExtension();

            //移动图片
            $request->file('advs_s')->move('./Uploads',$name.'.'.$suffix);


        }

       $res = $request->except('_token','advs_s');

        
       $res['advs_s'] = '/Uploads/'.$name.'.'.$suffix;
       
     

       $data = DB::table('advs')->insert($res);

       if($data){

        return redirect('/admin/advs')->with('msg','添加成功！');
       } else {

        return back()->withInput();
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
        //修改页面
        $res = DB::table('advs')->where('id',$id)->first();

        return view('admins.advs.edit',['res'=>$res]);
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
        $res = $request->except('_token','_method');

        $data = DB::table('advs')->where('id',$id)->update($res);

        if ($data) {

            return redirect('admin/advs')->with('msg','修改成功！');
        } else {
            return back();
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
        $res = DB::table('advs')->where('id',$id)->first();

        $data = unlink('.'.$res->advs_s);

        if($data){

            $info = DB::table('advs')->where('id',$id)->delete();

            if($info){

                return redirect('/admin/advs')->with('msg','删除成功！');
            }else{

                return back();
            }
        }
        
    }

    public function status(Request $request)
    {  
        //获取传过来的id和status
        $id = $request->input('id');
        $status = $request->input('status');

        //做判断，判断status传过来的值是不是等于1
        if($status == 1)
        {
            //从数据库取出来值id进行处理，如果取出来的值等于1，更改status变成0
            $info = Adv::where('id',$id)->update(['status'=>0]);
                if($info)
                {
                    return 1;
                }else
                {
                    return 0;
                }
        }else
        {
            $info = Adv::where('id',$id)->update(['status'=>1]);

                if($info)
                    {
                        return 1;
                    }else
                    {
                        return 0;
                    }
        }  

    }
}
