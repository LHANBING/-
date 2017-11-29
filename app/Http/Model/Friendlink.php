<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Friendlink extends Model
{
    protected $table = "friendlink";
    protected $fillable = ['friend_title','adr','des','logo','status'];
    public $timestamps = false;
}
