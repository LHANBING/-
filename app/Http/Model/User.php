<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = "users";
    public $timestamps = false;
    protected $fillable = ['tel','qq','username','password','email','user_photo','create_at','update_at'];
    
}
