<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['buy_id','sale_id','goods_id','order_num','order_otime','','buy_order_status','sale_order_status','create_at','update_at'];

  /*  public function User()
    {
    	return $this->hasOne('App\Http\Model\User', 'id', 'buy_uid');
        
    }*/
}
