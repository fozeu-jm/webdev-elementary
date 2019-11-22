<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\professor;

/**
 * Description of professorRepository
 *
 * @author pawn
 */
class professorRepository {

    protected $professor;
    private $term;
    private $id;

    public function __construct(professor $professor) {
        $this->professor = $professor;
    }

    public function getPaginate($n, $id) {

        return $this->professor->with('college')->where('col_id', '=', $id)->paginate($n);
    }
    
    public function getAll($id) {

        return $this->professor->with('college')->where('col_id', '=', $id)->get();
    }

    public function getById($id) {
        return $this->professor->findOrFail($id);
    }

    public function insert($prof, Array $inputs, $id = null) {
        $prof->firstname = $inputs['firstname'];
        $prof->lastname = $inputs['lastname'];
        $prof->gender = $inputs['gender'];
        $prof->datebirth = $inputs['datebirth'];
        $prof->email = $inputs['email'];
        $prof->adress = $inputs['adress'];
        $prof->phoneno = $inputs['phoneno'];
        if (!is_null($id)) {
            $prof->col_id = $id;
        }
        $prof->save();
    }

    public function store($id, Array $inputs) {
        $prof = new $this->professor;
        $prof = $this->insert($prof, $inputs, $id);
        return $prof;
    }

    public function update($id, Array $inputs) {
        $prof = $this->getById($id);
        return $this->insert($prof, $inputs);
    }

    public function destroy($id) {
        $prof = $this->getById($id);
        $prof->course()->detach();
        return $this->$prof->delete();
    }

    public function searching(Array $inputs, $id) {
        $this->term = $inputs['term'];
        $this->id = $id;
        return $this->professor->with('college')->whereRaw('LOWER(`firstname`) like ?', '%' . $this->term . '%')
                ->orWhereRaw('LOWER(`lastname`) like ?', '%' . $this->term . '%')->where('col_id', '=', $id)->get();
    }

}
