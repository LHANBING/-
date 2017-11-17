<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $table = "collect";
    protected $fillable = ['order_id','com_num','com_content','com_otime','create_at','update_at'];
}
