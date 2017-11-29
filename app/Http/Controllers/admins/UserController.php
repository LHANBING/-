<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use Hash;
use zgldh\QiniuStorage\QiniuStorage;

class UserController extends Controller
{
    /**
     * 显示后台用户列表页面
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //进行搜索查询和分页
        $res = User::where('username','like','%'.$request->input('search').'%')->orderBy('id','asc')->paginate($request->input('num',5));
        //数据的总数
        $count = User::where('username','like','%'.$request->input('search').'%')->count();
        // 最后一页的数值
        $last= $res->lastPage();

        return view('admins.user.index',['res'=>$res,'request'=>$request,'count'=>$count,'last'=>$last]);

        
    }

    /**
     * 显示后台用户添加页面
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.user.add');
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
            'tel' => 'required|regex:/^1[34578]\d{9}$/', 
            'password' => 'required|regex:/^\S{6,16}$/'  
        ],[
            'tel.required' => '手机号不能为空！',
            'tel.regex' => '手机号格式不正确！',
            'password.required' => '密码不能为空！',
            'password.regex' => '密码格式不正确！'
               
        ]);
        // 获取除_token以外的数据
        $res = $request->except('_token');
        // 对密码进行Hash加密
        $res['password'] = Hash::make($request->input('password'));
        // 添加数据到数据库
        $data = User::insert($res);
        // 判断数据是否添加成功
        if ($data)  
        {               
                //返回到用户列表页，并添加msg到session中
            return  redirect('/admin/user')->with('msg','添加成功');
        }else
        {   
               //返回到用户添加页面，并将数据存储到闪存中
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

  
        
    }

    /**
     * 处理后台用户的删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        
    }

       
    public function status($status,$id)
    {   
        if($status > 3)
        {
            $res = User::where('id',$id)->update(['status'=>0]);

            if($res)
            {
                return redirect('/admin/user')->with('msg','修改成功');
            }
        }else
        {   
            $res = User::where('id',$id)->update(['status'=>4]);

            if($res)
            {
                return redirect('/admin/user')->with('msg','修改成功');
            }
            
        }
    }

    /**
     * 处理后台用户的删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {   
        // 初始化
        $disk = QiniuStorage::disk('qiniu');

        // 获取传递过来的id值
        $id = $request->input('id');

        // 获取该id值得数据
        $res = User::where('id',$id)->first();

        // 判断该用户的user_photo是否为default.jpg
        if ( $res['user_photo'] == "default.jpg" ) 
        {   
            // 删除该用户
            $result = User::where('id',$id)->delete();

            if ($result) 
            {     
                //返回ajax的值 
                return 1;
            }

        }else
        {              
            // 删除头像图片在七牛
            $success = $disk->delete("userphoto/".$res['user_photo']);
            // 删除该用户
            if($success)
            {   
                // 删除该用户
                $result = User::where('id',$id)->delete();

                if ($result) 
                {
                        
                     //返回ajax的值 
                    return 1;
                }
            }else
            {       
                 //返回ajax的值 
                 return 0;
            }
        }
    }

}
