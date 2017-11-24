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
    public function index ()
    {	
        $id = session('uid');
		if($id){
    	$res = User::where('id',$id)->first();
   		return view('homes.center.info',['res'=>$res]);
        }else
        {
            return view('homes.login');
        }
    }


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
            $default = $data['user_photo'];
            if($bool)
            {   
                $res = User::where('id',$id)->insert(['user_photo'=>$fileName]);
                if($res)
                {
                    if( $default != "default.jpg")
                    {
                         $delete = $disk->delete($default);
                    }else
                    {
                        
                    }
                }
            }
         }else
         {
            return "没有文件上传";
         }
    	
    }

    public function edit ()
    {	

    	$id = session('uid');
		
    	$res = User::where('id',$id)->first();
    	return view('homes.center.perfect_edit',['res'=>$res]);
    }

     public function doedit (Request $request)
    {	
            // 去除传递过来参数中的token
    		$res = $request->except('_token');
            
            $id = session('uid');

            $bool = User::where('id',$id)->update($res);

            if($bool)
            {   
                 
                echo 1;
            }else
            {
                echo 0; 
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
