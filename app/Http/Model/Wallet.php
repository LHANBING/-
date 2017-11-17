<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = "wallet";
    protected $fillable = ['order_id'];
    public $timestamps = false;
}
