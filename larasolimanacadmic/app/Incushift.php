<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incushift extends Model
{
  public $table = "incushifts";

    protected $fillable = ['time', 'description', 'created_at', 'updated_at'];


    public $timestamps = true;

    public function student()
    {
        return $this->hasMany('App\Incustudent');
    }
}
