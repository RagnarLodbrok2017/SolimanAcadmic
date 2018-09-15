<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incustudent extends Model
{
    public $table = "incustudents";
    protected $fillable = ['id','first_name','middle_name','last_name','sex','region','phone','photo','dob','address','created_at','updated_at'];

    public $timestamps = true;
    public  function attendance()
    {
        return $this->hasMany('App\Incuattendance', 'incustudent_id');
    }
}
