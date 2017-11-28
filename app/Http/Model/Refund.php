<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
     protected $table = "refund";
     protected $fillable = ['order_id','content','ops','created_at','updated_at','status'];
}
