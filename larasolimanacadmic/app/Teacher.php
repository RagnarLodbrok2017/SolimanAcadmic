<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $table = "teachers";
    protected $fillable = ['name', 'sex', 'salary', 'region', 'salary_get', 'work_date', 'phone', 'address', 'type_id', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function type()
    {
        return $this->belongsTo('App\Type', 'type_id');
    }

    //Many To Many relations
    public function Incusubjects()
    {
        return $this->belongsToMany('App\Incusubject', 'teachers_incusubjects');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student', 'teachers_students');
    }

    public function shifts()
    {
        return $this->belongsToMany('App\Shift', 'teachers_shifts');
    }
}
