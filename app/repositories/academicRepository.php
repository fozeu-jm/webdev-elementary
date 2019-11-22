<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\academicYear;

/**
 * Description of academicRepository
 *
 * @author pawn
 */
class academicRepository {

    protected $academic;

    public function __construct(academicYear $academic) {
        $this->academic = $academic;
    }

    public function store($col_id, Array $inputs) {
        $academic = new academicYear();
        $academic->begin = $inputs['begin'];
        $academic->end = $inputs['end'];
        $academic->col_id = $col_id;
        $academic->save();

        return $academic;
    }

    public function getpaginate($n, $id) {
        return $this->academic->with('college')->where('col_id', '=', $id)->paginate($n);
    }

    public function getById($id) {
        return $this->academic->findOrFail($id);
    }

    public function getAll($id) {
        return $this->academic->with('college')->where('col_id', '=', $id)->get();
    }

    public function update($id, Array $inputs) {
        $academic = $this->getById($id);

        $academic->begin = $inputs['begin'];
        $academic->end = $inputs['end'];

        return $academic->save();
    }

    public function destroy($id) {
        return $this->getById($id)->delete();
    }

}
