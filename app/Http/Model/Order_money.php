<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Order_money extends Model
{
    protected $table = "orders_money";
    protected $fillable = ['shouru','zhichu','create_at','update_at'];
    public $timestamps = false;
}
