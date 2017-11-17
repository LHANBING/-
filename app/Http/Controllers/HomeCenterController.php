<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeCenterController extends Controller
{
   
    public function info ()
    {
    	return view('homes.center.info');
    }

    public function address ()
    {
    	return view('homes.center.address'); 
    }

    public function order () 
    {
        return view('homes.center.order');
    }

    public function change () 
    {
        return view('homes.center.change');
    }

    public function bill ()
    {
        return view('homes.center.bill');
    }

    public function billlist () 
    {
        return view('homes.center.billlist');
    }
    
    public function  collection() 
    {
        return view('homes.center.collection');
    }
  
    public function  foot() 
    {
        return view('homes.center.foot');
    }
  
    public function  comment() 
    {
        return view('homes.center.comment');
    }

    public function news () 
    {
        return view('homes.center.news');
    }


}
