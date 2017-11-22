<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;
use Hash;
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


    public function perfect ()
    {	
    	$id = session('uid');
		
    	$res = User::where('id',$id)->first();
    	return view('homes.center.perfect',['res'=>$res]);
    }

    public function doperfect (Request $requeste)
    {	
    		echo 'doperfect';
    	
    }

    public function edit ()
    {	

    	$id = session('uid');
		
    	$res = User::where('id',$id)->first();
    	return view('homes.center.perfect_edit',['res'=>$res]);
    }

     public function doedit (Request $requeste)
    {	

    		echo 'doedit';
    	
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
