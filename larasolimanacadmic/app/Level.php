<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
  public $table = "level";
    protected $fillable = ['name', 'type', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function student()
    {
        return $this->hasMany('App\Incustudent');
    }
}
