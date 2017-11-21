<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function index ()
    {
    	return view('homes.center.bill');
    }

    public function in ()
    {
    	return view('homes.center.billlist');
    }

    public function out ()
    {
    	return view('homes.center.billlist');
    }
}
