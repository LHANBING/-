<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Model\Friendlink;

class FriendLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $res = DB::table('friendlink')->get();
        // var_dump($request->all());

        $res = DB::table('friendlink')->
         where('friend_title','like','%'.$request->input('search').'%')->
         paginate($request->input('num',5));

        return view('admins.friendlink.index',['res'=>$res]); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.friendlink.add');
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
        'friend_title' => 'required',
        
        'des' => 'required'
       
    ],[

        'friend_title.required'=>'友情链接名称不能为空！',
        

        'des.required'=>'友情链接描述不能为空！',
        

    ]);

        //文件上传
        if($request->hasFile('logo')){
            //修改名字
            $name = rand(1111,9999).time();

            //修改后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            //移动图片
            $request->file('logo')->move('./Uploads',$name.'.'.$suffix);


        }
       //接收到后去除token
       $res = $request->except('_token','logo');

       //拼接图片的后缀名
       $res['logo'] = '/Uploads/'.$name.'.'.$suffix;
       
     
       //将数据添加进数据库
       $data = DB::table('friendlink')->insert($res);

       if($data){

        return redirect('/admin/friendlink')->with('msg','添加成功！');
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
        //修改编辑页面
        $res = DB::table('friendlink')->where('id',$id)->first();

        return view('admins.friendlink.edit',['res'=>$res]);
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
        //echo $id;
        $res = $request->except('_token','_method');

        $data = DB::table('friendlink')->where('id',$id)->update($res);

        if ($data) {

            return redirect('/admin/friendlink')->with('msg','修改成功！');      
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
        //从数据库中查找id
        $res = DB::table('friendlink')->where('id',$id)->first();
        //从数据库中提取数据
        $data = unlink('.'.$res->logo);

        if($data){
            //定义一个info从数据库中找到id并执行删除
            $info = DB::table('friendlink')->where('id',$id)->delete();
            //做判断给弹框提示
            if($info){

                return redirect('/admin/friendlink')->with('msg','删除成功！');
            } else {
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
            $info = Friendlink::where('id',$id)->update(['status'=>0]);
                if($info)
                {
                    return 1;
                }else
                {
                    return 0;
                }
        }else
        {
            $info = Friendlink::where('id',$id)->update(['status'=>1]);

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