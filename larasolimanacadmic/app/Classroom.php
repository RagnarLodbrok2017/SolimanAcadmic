<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
  public $table = "classroom";
    protected $fillable = ['name', 'about', 'created_at', 'updated_at'];

    public $timestamps = true;

    // public function student()
    // {
    //     return $this->hasMany('App\Incustudent','classroom_id');
    // }
}
