<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Model\Manager;
use Session;
use Hash;
use DB;


class AdminLoginController extends Controller
{
     public function login()
    {

        return view('admins.login');
    }

    public function dologin(Request $request)
    {
        $res = $request->except('_token');

        // var_dump($res);

        $uname = Manager::where('m_name',$res['username'])->first();

        if (!$uname) {
            return redirect('/admin/login')->with('msg','您输入的用户名或密码错误');
        } 

        if (!Hash::check($res['password'],$uname->m_password)) {
            return redirect('/admin/login')->with('msg','您输入的用户名或密码错误');
        }

        if (session('vcode') != $res['code']) {
            return redirect('/admin/login')->with('msg','验证码错误');
        }

        $request->session()->put('uid',$uname->id);

        return view('admins.index');
    }

    public function code()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 120, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('vcode', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
       echo  $builder->output();
    }

    //添加管理员
   /* public function mima()
    {
        $arr = array('m_name'=>'admin','auth'=>'1','m_photo'=>'/Uploads/default.jpg');
        $arr['m_password'] = Hash::make('admin');
        $res = Manager::create($arr);
        if ($res) {
            echo 'yes';
        }
    }*/

}
