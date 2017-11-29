<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use Hash;

use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use session;
use Cookie;
class HomeRegisterController extends Controller
{	
  	/**
  	 * 显示注册页面
  	 * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {   

	    return view('homes/register');
    }

    /**
	 * 获取注册验证码
	 * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function phone (Request $request)
    {	
      	   // 获取手机号
          $phone = $request->input('tel');
          
           //判断数据库是否注册获取的手机号
        	 $res = User::where('tel',$phone)->first();
        	if($res)
        	{
        		return '手机号已注册！';
        	}       

      		// 获取AK,CK的值
      		$config = config('alidayukey');

      		// 生成验证码
          $code = rand(100000, 999999);

          $client  = new Client($config);
          $sendSms = new SendSms;
          $sendSms->setPhoneNumbers($phone);
          $sendSms->setSignName('张康');
          $sendSms->setTemplateCode('SMS_111555094');
          $sendSms->setTemplateParam(['code'=>$code]);
          $sendSms->setOutId('demo');
    	    $resp= $client->execute($sendSms);
          
      //检测短信是否成功发送
    	if($resp->Code =='OK')
    		{	
    			//向session中存入验证码
    			session()->put('code', $code);
    			
          // 返回ajax的值
    			echo 1;
        // return view('homes/register');
    			
    		}else
    		{
          // 返回ajax的值
    			echo 0;
    			
    		}

    }

    /**
     * 处理注册信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  	
      	// 获取注册信息并放入数组res
      	$res = $request->except('_token','code');

      	// 使用Hash加密注册密码
      	$res['password'] = Hash::make($request->input('password'));
    	 
         // 获取存入session中的code
      	$session_code = session('code');
  
       //验证码是否一致
       if($session_code == $request->input('code'))
       {
       		// 注册信息存入数据库
    			User::insert($res);
           
           //返回ajax的值
         		echo 1 ;         		
       }else
       {    
          //返回ajax的值
            echo 0;
       }

    }
}
