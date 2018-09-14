<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superadminbudget extends Model
{
    protected $fillable = ['id', 'type	', 'salary', 'about', 'description' , 'created_at', 'updated_at'];

    public $timestamps = true;
}
