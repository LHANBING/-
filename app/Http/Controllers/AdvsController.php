<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdvsController extends Controller
{
    public function index()
    {
		return view('admins.advs.index');    	
    }

    public function add()
    {
		return view('admins.advs.add');    	
    }
}
