<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
  public $table = "attendance";
    protected $fillable = ['date', 'student_id' , 'created_at', 'updated_at'];

    public $timestamps = true;


}
