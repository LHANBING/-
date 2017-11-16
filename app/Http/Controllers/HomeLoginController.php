<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeLoginController extends Controller
{
    public function login()
    {
    	return view('homes.login');
    }

    public function register()
    {
    	return view('homes.register');
    }

    public function dologin()
    {
    	return view('homes.index');
    }
}
