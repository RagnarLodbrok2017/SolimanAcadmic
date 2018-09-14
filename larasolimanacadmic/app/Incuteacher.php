<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incuteacher extends Model
{
    protected $fillable = ['id', 'name', 'sex', 'salary' , 'region', 'phone', 'address' , 'created_at', 'updated_at'];

    public $timestamps = true;

}
