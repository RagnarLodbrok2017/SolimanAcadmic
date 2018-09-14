<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incushift extends Model
{
    protected $fillable = ['id', 'time', 'description', 'created_at', 'updated_at'];


    public $timestamps = true;

    public function student()
    {
        return $this->hasMany('App\Incustudent');
    }
}
