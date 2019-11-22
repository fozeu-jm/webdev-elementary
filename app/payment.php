<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model {

    protected $table = 'payment';
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\College', 'col_id');
    }

    public function student() {
        return $this->belongsTo('App\student', 'stu_id');
    }

    public function installment() {
        return $this->belongsTo('App\installments', 'ins_id');
    }

}
