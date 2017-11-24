<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Goodsdetail extends Model
{
    protected $table = "goodsdetail";
    protected $fillable = ['goods_id','content','collect','pic'];
    public $timestamps = false;
}
