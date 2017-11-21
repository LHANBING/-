<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Type;
use App\Http\Model\Manager;

class IndexController extends Controller
{
    public function index()
    {
    	//$info=Type::get(['id','typename'])->first();
        //dd($info);
    	return view('homes.index');
    }
}
