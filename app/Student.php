<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'email', 'lastname',
    ];
    protected $table = 'student';
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\College', 'col_id');
    }

    public function level() {
        return $this->belongsTo('App\level', 'lev_id');
    }

    public function academicYear() {
        return $this->belongsTo('App\academicYear', 'aca_id');
    }

    public function course() {
        return $this->belongsToMany('App\course', 'student_course')->withPivot('mark');
    }

    public function internship() {
        return $this->belongsToMany('App\internship', 'stud_intern')->withPivot('mark');
    }
    
    public function attendance(){
        return $this->hasMany('App\attendance');
    }
    
    public function payment(){
        return $this->hasMany('App\payment');
    }
    
    public function averages(){
        return $this->hasMany('App\averages');
    }
    
    public function student_course(){
        return $this->hasMany('App\student_course');
    }
    

}
