<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = "manager";
    protected $fillable = ['m_name','m_password','m_photo','auth'];
    public $timestamps = false;
}
