<?php

namespace App\Http\Controllers\home\register;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class registerController extends Controller
{
    public function index () 
    {
    	return view('homes.register.index');
    }

    public function doregister()
    {
    	echo "处理注册";
    }
}
