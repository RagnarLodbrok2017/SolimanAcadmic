<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $fillable = ['id', 'name', 'salary', 'work_date' , 'created_at', 'updated_at'];

    public $timestamps = true;

}
