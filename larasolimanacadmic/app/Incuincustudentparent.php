<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incuincustudentparent extends Model
{
    protected $fillable = ['id','father_name','mother_name','job','FPhone','LPhone','email','nationality','status','created_at','updated_at'];

    public function student()
    {
        return $this->hasMany('App\Incustudent');
    }
    public $timestamps = true;
}
