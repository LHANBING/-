<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Typechild extends Model
{
    protected $table = "typechild";
    protected $fillable = ['type_id','typechildname'];
    public $timestamps = false;
}
