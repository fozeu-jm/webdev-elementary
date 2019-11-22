<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor extends Model {

    protected $table = 'professor';
    
    protected $fillable = [
        'firstname', 'col_id','lastname','gender','adress','datebirth','phoneno','email'
    ];
    
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\college','col_id');
    }
    
    public function course(){
        return $this->belongsToMany('App\course','course_professor');
    }
}
