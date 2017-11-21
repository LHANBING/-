<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "message";
    protected $fillable = ['buy_uid','sale_uid','goods_id','msg_content'];
    public $timestamps = false;
}
