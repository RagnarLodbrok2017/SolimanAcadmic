<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incusubject extends Model
{
    public $table = "incusubjects";
    protected $fillable = ['id', 'name', 'code' , 'created_at', 'updated_at'];

    public $timestamps = true;

    //mant to many with teacher
    public function teacher()
    {
        return $this->belongsToMany('App\Teacher', 'teachers_incusubjects');
    }

}
