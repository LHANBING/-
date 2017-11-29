<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Model\Friendlink;

use zgldh\QiniuStorage\QiniuStorage;

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
        'adr' => 'required',       
        'des' => 'required',      
        'logo' => 'required'       
    ],[
        'friend_title.required'=>'友情链接名称不能为空！',       
        'adr.required'=>'友情链接地址不能为空！',       
        'des.required'=>'友情链接描述不能为空！',       
        'logo.required'=>'友情链接Logo不能为空！',       
    ]);
        //剔除'_token','logo'
        $res = $request->except('_token','logo');      

        //文件上传
        if($request->hasFile('logo'))
        {
            //获取文件
            $file=$request->file('logo');
            //初始化七牛
            $disk=QiniuStorage::disk('qiniu');
            //重命名文件名
            $name=md5(rand(1111,9999).time()).'.'.$file->getClientOriginalExtension();
            //上传到文件到七牛
            $bool=$disk->put('friendlink/'.$name,file_get_contents($file->getRealPath()));

            $res['logo'] = $name;
        }

        // 链接数据库
       $data = Friendlink::insert($res);

       if($data){

        return redirect('/admin/friendlink')->with('msg','添加成功！');
       } else {

        return back()->withInput($request->except('_token','logo'));
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


      //验证
       $this->validate($request, [
        'friend_title' => 'required',       
        'adr' => 'required',       
        'des' => 'required',          
    ],[
        'friend_title.required'=>'友情链接名称不能为空！',       
        'adr.required'=>'友情链接地址不能为空！',       
        'des.required'=>'友情链接描述不能为空！',              
    ]);

        
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
        //
        // $res = DB::table('friendlink')->where('id',$id)->first();

        // $data = unlink('.'.$res->logo);

        // if($data){

        //     $info = DB::table('friendlink')->where('id',$id)->delete();

        //     if($info){

        //         return redirect('/admin/friendlink')->with('msg','删除成功！');
        //     } else {
        //         return back();
        //     }
        // }
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

    public function delete(Request $request)
    {   

        // 初始化
        $disk = QiniuStorage::disk('qiniu');

        // 获取传递过来的id值
        $id = $request->input('id');

        // 获取该id值得数据
        $res = Friendlink::where('id',$id)->first();
       
        // 删除Logo图片在七牛
        $success = $disk->delete("friendlink/".$res['logo']);
        // 判断删除是否
        if ($success) 
        {   
            // 删除该用户
            $result = Friendlink::where('id',$id)->delete();

            if ($result) 
            {     
                //返回ajax的值 
                return 1;
            }

        }
    }
}