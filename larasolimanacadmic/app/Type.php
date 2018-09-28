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


}
