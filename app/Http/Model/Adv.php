<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    protected $table = "advs";
    protected $fillable = ['advs_title','advs_content','advs_src','advs_photo'];
    public $timestamps = false;
}
