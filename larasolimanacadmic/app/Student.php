<?php /** @noinspection ALL */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = "students";
    protected $fillable = ['first_name','middle_name','last_name','sex','region','phone','photo','dob','address','created_at','updated_at'];

    public $timestamps = true;
    public  function attendance()
    {
        return $this->hasMany('App\attendance', 'student_id');
    }
    public function classroom()
    {
      return $this->belongsTo('App\Classroom' , 'classroom_id');
    }
    public function level()
    {
      return $this->belongsTo('App\Level' , 'level_id');
    }
    public function shift()
    {
      return $this->belongsTo('App\shift' , 'shift_id');
    }
    public function getFullNameAttribute(){
      return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
    public function payment() {
        return $this->hasOne('App\Payment');
    }
}
