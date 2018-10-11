<?php /** @noinspection ALL */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = "students";
    public $fillable = ['first_name','middle_name','last_name','sex','region','phone','photo','dob','address','created_at','updated_at'];

    public $timestamps = true;
    public function type(){
        return $this->belongsTo('App\Type','type_id');
    }
    //mant to many with teacher
    public function teacher()
    {
        return $this->belongsToMany('App\Teacher', 'teachers_students');
    }

    public  function attendance()
    {
        return $this->hasMany('App\Attendance', 'student_id');
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
      return $this->belongsTo('App\Shift' , 'shift_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status' , 'status_id');
    }
    public function getFullNameAttribute(){
      return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
    public function payment() {
        return $this->hasOne('App\Payment');
    }
    public function stage() {
        return $this->belongsTo('App\Stage','stage_id');
    }
    public function parent() {
        return $this->hasOne('App\Parents');
    }
}
