<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class installments extends Model {

    protected $table = 'installments';
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\College', 'col_id');
    }

    public function academicYear() {
        return $this->belongsTo('App\academicYear', 'aca_id');
    }

    public function payment() {
        return $this->hasMany('App\payment');
    }

}
