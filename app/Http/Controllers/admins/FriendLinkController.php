<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

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

       $res = $request->except('_token','logo');

        
       $res['logo'] = '/Uploads/'.$name.'.'.$suffix;
       
     

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
        //
        $res = DB::table('friendlink')->where('id',$id)->first();

        $data = unlink('.'.$res->logo);

        if($data){

            $info = DB::table('friendlink')->where('id',$id)->delete();

            if($info){

                return redirect('/admin/friendlink')->with('msg','删除成功！');
            } else {
                return back();
            }
        }
    }
}
