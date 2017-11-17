<?php

namespace App\Http\Controllers\home\login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index ()
    {
    	return view('homes.login.index');
    }

    public function dologin()
    {
    	echo "处理登录";
    }
}
