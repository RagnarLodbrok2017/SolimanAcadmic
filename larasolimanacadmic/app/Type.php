<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $table = 'type';
    protected $fillable = ['name','description','created_at','updated_at'];
    public $timestamps = true;

    public function budget(){
        return $this->hasMany('App\Superadminbudget');
    }
    public function student(){
        return $this->hasMany('App\Student');
    }
    public function teacher(){
        return $this->hasMany('App\Teacher');
    }
    public function stuffs(){
        return $this->belongsToMany('App\Stuff','stuff_type');
    }
}
