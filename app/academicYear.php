<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class academicYear extends Model {

    protected $fillable = [
        'begin', 'end'
    ];
    
    protected $table = 'academicyear';
    
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\College','col_id');
    }
    
    public function student(){
        return $this->hasMany('App\Student');
    }
    
    public function installment(){
        return $this->hasMany('App\installment');
    }

}
