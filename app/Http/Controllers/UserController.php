<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	return view('admins.user.index');
    }
    public function add()
    {
    	return view('admins.user.add');
    }
}
