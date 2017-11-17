<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "type";
    protected $fillable = ['typename'];
    public $timestamps = false;
}
