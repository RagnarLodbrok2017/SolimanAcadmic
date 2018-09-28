<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superadminbudget extends Model
{
    public $table = "superadminbudget";
    protected $fillable = ['type_id', 'salary', 'day', 'description' , 'user_id','created_at', 'updated_at'];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function type(){
        return $this->belongsTo('App\Type','type_id');
    }
}
