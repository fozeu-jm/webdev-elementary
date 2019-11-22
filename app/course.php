<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model {

    protected $table = 'course';
    protected $fillable = [
        'sdsdsf'
    ];
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\College', 'col_id');
    }

    public function professor() {
        return $this->belongsToMany('App\professor', 'course_professor');
    }

    public function level() {
        return $this->belongsToMany('App\level', 'level_course');
    }

    public function student() {
        return $this->belongsToMany('App\Student', 'student_course')->withPivot('mark');
    }

    public function student_course() {
        return $this->hasMany('App\student_course');
    }

}
