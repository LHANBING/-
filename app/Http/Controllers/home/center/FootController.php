<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FootController extends Controller
{
    public function index()
    {
    	return view('homes.center.foot');
    }
}
