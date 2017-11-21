<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;

use \DB;
class OrderController extends Controller
{
    public function index () 
    {
    	
    	return  view('homes.center.order');
    }

  
}
