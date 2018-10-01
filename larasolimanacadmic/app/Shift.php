<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
  public $table = "shift";

    protected $fillable = ['time', 'description', 'created_at', 'updated_at'];


    public $timestamps = true;

    public function student()
    {
        return $this->hasMany('App\Student');
    }

    /* Many To Many with Teacher */
    public function teacher()
    {
        return $this->belongsToMany('App\Shift', 'teachers_shifts');
    }
}
