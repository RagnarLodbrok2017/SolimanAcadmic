<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['id', 'name', 'type', 'numOfHours' , 'shift' , 'created_at', 'updated_at'];

    public $timestamps = true;

    public function student()
    {
        return $this->hasMany('App\Student');
    }
}
