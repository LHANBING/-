<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use Hash;


class HomeLoginController extends Controller
{   

    /**
     * 显示登录页面
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('homes.login');
    }

    /**
     * 处理用户登录提交的表单
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         
    	 // 获取用户名
        $username = $request->input('username');

        // 判断用户在数据中是否存在 
        $users = User::where('tel', $username)->first();
        
        // 使用Hash检测输入的手机号和数据库值是否一致
       $pass = Hash::check($request->input('password'),$users->password);
       
        if ($users && $pass ){
            
            // 将用户数据保存至session中
            $request->session()->put('uid', $users->id);
            $request->session()->put('uname', $users->username);
            $request->session()->put('uphoto', $users->user_photo);

            // 跳转至首页
            return redirect('/');
        } else {

            // 返回登录页(带提示信息）
        return redirect('/home/login')->with('status', '手机号或密码错误，请重新登录。');
        }
         
    }

    /**
     * 用户退出账号登录并返回首页
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->forget('uid');
        return redirect('/');
    }
}
