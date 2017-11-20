<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Type;
use App\Http\Model\Typechild;

class IndexController extends Controller
{
    public function index()
    {
    	$res = Type::all();
        $reschild = Typechild::all();
    	return view('homes.index',['res'=>$res,'reschild'=>$reschild]);
    }
}
