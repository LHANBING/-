<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Favor extends Model
{
    protected $table = "favor";
    protected $fillable = ['user_id','goods_id'];
    public $timestamps = false;
}
