<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FriendLinkController extends Controller
{
     public function index()
    {
		return view('admins.friendlink.index');    	
    }

    public function add()
    {
		return view('admins.friendlink.add');    	
    }
}
