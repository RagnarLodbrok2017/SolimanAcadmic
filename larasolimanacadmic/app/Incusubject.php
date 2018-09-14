<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incusubject extends Model
{
    protected $fillable = ['id', 'name', 'code' , 'created_at', 'updated_at'];

    public $timestamps = true;

}
