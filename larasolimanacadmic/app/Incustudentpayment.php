<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incustudentpayment extends Model
{
    protected $fillable = ['id','price','created_at','updated_at'];

    public function student() {
        return $this->hasOne('App\Incustudent');
    }
    public $timestamps = true;

}
