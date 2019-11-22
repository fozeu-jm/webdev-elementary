<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class internship extends Model
{
    protected $table = 'internship';
    
    public $timestamps = false;
    
    public function college(){
        return $this->belongsTo('App\College','col_id');
    }
    
    public function student(){
        return $this->belongsToMany('App\Student','stud_intern')->withPivot('mark');
    }
}
