<?php

namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = "users";
    protected $fillable = ['tel','qq','username','password','email','user_photo','money','create_at','updated_at'];
    
}
