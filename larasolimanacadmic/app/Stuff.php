<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    public $table = "stuff";
    protected $fillable = ['name', 'salary','salary_get','phone', 'work_date' , 'created_at', 'updated_at'];

    public $timestamps = true;

    public function types(){
        return $this->belongsToMany('App\Type','stuff_type');
    }
}
