<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "message";
    protected $fillable = ['order_id','mes_status','created_at','msg_content','updated_at','send_uid','receive_uid'];
   
}