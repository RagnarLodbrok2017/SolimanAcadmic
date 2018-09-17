<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
  public $table = "parents";
    protected $fillable = ['father_name','mother_name','job','FPhone','LPhone','email','nationality','status','created_at','updated_at'];

    public function student()
    {
        return $this->hasMany('App\Student');
    }
    public $timestamps = true;
}
