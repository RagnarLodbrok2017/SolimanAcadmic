<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incuattendance extends Model
{
    protected $fillable = ['id', 'date', 'incustudent_id' , 'created_at', 'updated_at'];

    public $timestamps = true;


}
