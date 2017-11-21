<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Goodsdetail extends Model
{
    protected $table = "goodsdetail";
    protected $fillable = ['goods_id','content','multi_photo','collect'];
    public $timestamps = false;
}
