<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model {

    protected $table = 'attendance';
    public $timestamps = false;
    
    public function student(){
        return $this->belongsTo('App\student','student_id');
    }

}
