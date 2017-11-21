<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;

class InfoController extends Controller
{
    public function index ()
    {	 $id = session('uid');
		
    	$res = User::where('id',$id)->first();
    	
   		return view('homes.center.info',['res'=>$res]);
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

     public function douser_change (Request $requeste)
    {	

    		echo 'doedit';
    	
    }

}
