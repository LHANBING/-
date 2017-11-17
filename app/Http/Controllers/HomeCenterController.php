<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeCenterController extends Controller
{
    public function index ()
    {

    	return view('homes.center.index');
    }

    public function info ()
    {
    	return view('homes.center.info');
    }
}
