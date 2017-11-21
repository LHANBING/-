<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $table = "collect";
    protected $fillable = ['user_id','goods_id'];
    
}
