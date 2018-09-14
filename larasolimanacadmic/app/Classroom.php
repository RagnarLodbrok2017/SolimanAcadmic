<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['id', 'name', 'about', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function student()
    {
        return $this->hasMany('App\Incustudent');
    }
}
