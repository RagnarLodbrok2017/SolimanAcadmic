<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $table = "payments";

    protected $fillable = ['price','created_at','updated_at'];

    public function student() {
        return $this->hasOne('App\Student');
    }
    public $timestamps = true;

}
