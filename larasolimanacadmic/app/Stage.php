<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public $table = "stage";

    protected $fillable = ['name','created_at','updated_at'];

    public function student() {
        return $this->belongsTo('App\Student');
    }
    public $timestamps = true;

}
