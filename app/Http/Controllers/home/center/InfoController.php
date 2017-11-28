<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use Hash;
use zgldh\QiniuStorage\QiniuStorage;
use DB;

class InfoController extends Controller
{   
    /**
     * 显示个人信息页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {	
        //获取session中的uid
        $id = session('uid');

        // 存在uid，进入个人信息页面，不存在，返回首页
		if($id)
        {   
            // 通过session中uid获取用户信息
        	$res = User::where('id',$id)->first();

       		return view('homes.center.info',['res'=>$res]);
        }else
        {   
            // 返回首页
            return view('/');
        }
    }

    /**
     * 显示个人信息页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ()
    {   
        //获取session中的uid
        $id = session('uid');
        // 通过session中uid获取用户信息
        $res = User::where('id',$id)->first();

        return view('homes.center.edit',['res'=>$res]);
    }

    /**
     * 处理修改个人信息
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function doedit (Request $request)
    {   
            // 去除传递过来参数中的token
            $res = $request->except('_token');
            // 获取存入session中的uid
            $id = session('uid');
            // 修改个人信息
            $bool = User::where('id',$id)->update($res);
            // 判断修改是否成功
            if($bool)
            {   
                //返回ajax的值 
                echo 1;
            }else
            {   
                //返回ajax的值 
                echo 0; 
            }
        
    }
    /**
     * 处理修改个人头像信息
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function douserphoto (Request $request)
    {	  
         //获取session中的uid   
        $id = session('uid');
        // 获取上传头像的值
    	$user_photo = $request->file('user_photo');

             //判断是否有文件上传
         if($request->hasFile('user_photo')){

            // 初始化
            $disk = QiniuStorage::disk('qiniu');
            // 获取上传头像图片的值
            $fileName = md5($user_photo->getClientOriginalName().time().rand(1111,9999)).'.'.$user_photo->getClientOriginalExtension();

            // 上传到七牛
            $bool = $disk->put('userphoto/'.$fileName,file_get_contents($user_photo->getRealPath()));

            // 获取头像的值
            $data = User::where('id',$id)->first();
            $delete = $data['user_photo'];

            // 判断头像图片上传七牛是否成功
                if($bool)
                {   
                        // 判断头像的值是否为defaul.jpg 是 不删除 否 删除
                        if($delete == "default.jpg")
                        {   
                            //将上传获得头像的值更新到数据库
                           $res = User::where('id',$id)->update(['user_photo'=>$fileName]);
                           // 判断更新是否成功
                             if($res)
                             {  
                                //返回ajax的值 
                                return ["status"=>1,'user_photo'=>$fileName];
                             }else
                             {  
                                //返回ajax的值 
                                return ["status"=>0,'user_photo'=>$delete];
                             }      
                             
                        }else
                        {
                             
                              // 删除头像图片在七牛
                             $success = $disk->delete("userphoto/".$delete);
                                // 判断删除是否成功
                                 if($success)
                                 {  
                                    //将上传获得头像的值更新到数据库
                                    $res = User::where('id',$id)->update(['user_photo'=>$fileName]);
                                     // 判断更新是否成功
                                      if($res)
                                      { 
                                        //返回ajax的值 
                                         return ["status"=>1,'user_photo'=>$fileName];
                                      }
                                 }else
                                 {
                                    $res = User::where('id',$id)->update(['user_photo'=>$fileName]);
                                      if($res)
                                      {     
                                        //返回ajax的值 
                                         return ["status"=>1,'user_photo'=>$fileName];
                                      }else
                                      { 
                                        //返回ajax的值 
                                        return ["status"=>0,'user_photo'=>$delete];
                                      }

                                 }  
                        }
                    
                }else
                {   
                    //返回ajax的值 
                    return ['status'=>0,'user_photo'=>$delete];
                }
         }else
         {  
            //返回ajax的值 
            return "没有上传文件！";
         }
    	
    }

    

    /**
     * 显示修改密码页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_change ()
    {	

    	return view('homes.center.user_change');
    }

    /**
     * 处理修改密码的信息
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function douser_change (Request $request)
    {	//获取session中的uid 
        $uid = session('uid');
        // 获取用户的信息
        $users = User::where('id', $uid)->first();
        // 用Hash检测输入的旧密码是否正确
        $pass = Hash::check($request->input('oldpassword'),$users->password);
        
        // 判断旧密码的值是否正确
        if($pass)
        {     
             // 使用Hash加密新密码
             $password = Hash::make($request->input('newpassword'));
             // 将加密后的密码更新到数据库
             $info = User::where('id',$uid)->update(['password'=>$password]);
              // 判断是否更新成功
                 if ($info) 
                 {  
                    // 返会ajax的值
                    echo 1;
                 }else
                 {  
                    // 返会ajax的值
                    echo 0;
                 }
        }else
        {
            echo 0;
        }
    	
    }

}
