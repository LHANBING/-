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
     * 修改个人信息
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
     * 修改个人头像
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function douserphoto (Request $request)
    {	  
            
        $id = session('uid');
    	$user_photo = $request->file('user_photo');

             //判断是否有文件上传
         if($request->hasFile('user_photo')){

            // 初始化
            $disk = QiniuStorage::disk('qiniu');
            $fileName = md5($user_photo->getClientOriginalName().time().rand(1111,9999)).'.'.$user_photo->getClientOriginalExtension();

            // 上传到七牛
            $bool = $disk->put('userphoto/'.$fileName,file_get_contents($user_photo->getRealPath()));

            $data = User::where('id',$id)->first();
            $delete = $data['user_photo'];

                if($bool)
                {   

                        if($delete == "default.jpg")
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
                             
                        }else
                        {
                             

                             $success = $disk->delete("userphoto/".$delete);
                             
                                 if($success)
                                 {
                                    $res = User::where('id',$id)->update(['user_photo'=>$fileName]);
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

    


    public function user_change ()
    {	

    	return view('homes.center.user_change');
    }

     public function douser_change (Request $request)
    {	
        $uid = session('uid');
        $users = User::where('id', $uid)->first();
        $pass = Hash::check($request->input('oldpassword'),$users->password);
        

        if($pass)
        {
             $password = Hash::make($request->input('newpassword'));
             $info = User::where('id',$uid)->update(['password'=>$password]);
             
                 if ($info) {
                    echo 1;
                 }else
                 {
                    echo 0;
                 }
        }else
        {
            echo 0;
        }
    	
    }

}
