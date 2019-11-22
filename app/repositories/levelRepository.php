<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\level;

/**
 * Description of levelRepository
 *
 * @author pawn
 */
class levelRepository {

    protected $level;
    protected $term;

    public function __construct(level $level) {
        $this->level = $level;
    }

    public function getPaginate($n, $id) {
        return $this->level->with('college')->where('col_id', '=', $id)->paginate($n);
    }
    
    public function getAll($id) {
        return $this->level->with('college')->where('col_id', '=', $id)->get();
    }

    public function store(Array $inputs, $col_id) {
        $level = new $this->level;

        $level->name = $inputs['name'] . '-' . $inputs['level'];
        $level->col_id = $col_id;

        $level->save();

        return $level;
    }

    public function getById($id) {
        return $this->level->findOrFail($id);
    }

    public function update($id, Array $inputs) {
        $level = $this->getById($id);

        $level->name = $inputs['name'] . '-' . $inputs['level'];

        return $level->save();
    }

    public function delete($id) {
        return $this->getById($id)->delete();
    }
    
    public function searching(Array $inputs, $id){
        $this->term = $inputs['term'];
        return $this->level->with('college')->where('col_id', '=', $id)
                            ->whereRaw('LOWER(`name`) like ?', '%'.$this->term.'%')->get();
    }

}
