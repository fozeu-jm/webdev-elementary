<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    protected $fillable = [
        'name', 'col_id'
    ];
    
    protected $table = 'level';
    
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\College','col_id');
    }
    
    public function course(){
        return $this->belongsToMany('App\course', 'level_course');
    }
    
    public function student(){
        return $this->hasMany('App\Student');
    }
    
    public function averages(){
        return $this->hasMany('App\averages');
    }
}
