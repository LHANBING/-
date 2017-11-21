<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Favordetail extends Model
{
    protected $table = "favordetail";
    protected $fillable = ['user_id','goods_id','count'];
    public $timestamps = false;
}
