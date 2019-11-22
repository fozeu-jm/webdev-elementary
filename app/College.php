<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model {

    protected $fillable = [
        'name', 'email', 'phoneno'
    ];
    protected $table = 'college';
    public $timestamps = false;

    public function user() {
        return $this->hasMany('App\User');
    }

    public function academicYear() {
        return $this->hasMany('App\academicYear');
    }

    public function level() {
        return $this->hasMany('App\level');
    }

    public function professor() {
        return $this->hasMany('App\professor');
    }

    public function course() {
        return $this->hasMany('App\course');
    }

    public function student() {
        return $this->hasMany('App\Student');
    }

    public function installments() {
        return $this->hasMany('App\installments');
    }
    
    public function payment(){
        return $this->hasMany('App\payment');
    }
    
    public function settings(){
        return $this->hasMany('App\settings');
    }

}
