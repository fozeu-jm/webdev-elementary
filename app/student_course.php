<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_course extends Model {

    protected $table = 'student_course';
    public $timestamps = false;
    
    public function student(){
        return $this->belongsTo('App\student', 'student_id');
    }
    
    public function course(){
        return $this->belongsTo('App\course', 'course_id');
    }

}
