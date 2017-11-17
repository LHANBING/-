<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = "goods";
    protected $fillable = ['user_id','type_id','typechild_id','title','goods_photo','newprice','oldprice','transprice','address','create_at','update_at'];
}
