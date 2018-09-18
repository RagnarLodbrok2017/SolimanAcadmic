<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = "status";
    protected $fillable = ['name', 'discount', 'created_at', 'updated_at'];
    public $timestamps = true;
    public function student(){
        return $this->hasMany('App\Student');
    }
}
