<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
     public function father()
    {
    	return view('admins.type.father');
    }
    public function son()
    {
    	return view('admins.type.son');
    }
}
