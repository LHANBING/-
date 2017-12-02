<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['buy_uid','sale_uid','goods_id','order_num','order_otime','buy_order_status','sale_order_status','created_at','updated_at','pay_money','pay_yunfei','pay_time','address'];

    

}
