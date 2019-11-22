<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settings extends Model {

    protected $table = 'settings';
    public $timestamps = false;

    public function college() {
        return $this->belongsTo('App\College', 'col_id');
    }

}
