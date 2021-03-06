<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use Hash;

use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
// use session;
use Cookie;
class HomeChangeController extends Controller
{
    /**
  	 * 显示修改密码页面
  	 * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
	    return view('homes/change');
    }

    /**
  	 * 获取修改验证码
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
  		if($res == false)
  		{
  			return '您还没注册，赶快去注册吧！';
  		}       

         // 获取AK,CK的值
  		   $config = config('alidayukey');

  		   // 生成验证码
          $code = rand(100000, 999999);

          //往session存入code
          session(['code'=>$code]);

          $client  = new Client($config);
          $sendSms = new SendSms;
          $sendSms->setPhoneNumbers($phone);
          $sendSms->setSignName('张康');
          $sendSms->setTemplateCode('SMS_111555094');
          $sendSms->setTemplateParam(['code'=>$code]);
          $sendSms->setOutId('demo');
  		   $resp= $client->execute($sendSms);

  		
    		if($resp->Code =='OK')
    			{	
    				//向session中存入验证码
    				session(['code'=>$code]);

             // 返回ajax的值
            echo 1;

            // return view('homes/change');    				
    			}else
    			{
            // 返回ajax的值
    				echo 0;
    				
    			}
    }

    /**
     * 处理密码信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  	

    	// 使用Hash加密新密码
    	$password= Hash::make($request->input('password'));
    	 
        // 获取存入session中的code
      	$session_code = session('code');
      	
       //验证码是否一致
       if($request->input('code') == $session_code)
       {
       		// 将修改的密码存入数据库
 			   User::Where('tel',$request->input('tel'))->update(['password'=>$password]);

          // 返回ajax的值
       		echo 1 ;
       		
       }else
       {    
           // 返回ajax的值
           echo 0;
       }

    }
}
