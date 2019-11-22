<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class averages extends Model {

    protected $table = 'averages';
    public $timestamps = false;
    
    public function student(){
        return $this->belongsTo('App\student','stu_id');
    }
    
    public function level(){
        return $this->belongsTo('App\level','level_id');
    }
}
