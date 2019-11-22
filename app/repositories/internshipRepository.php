<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\internship;

/**
 * Description of internshipRepository
 *
 * @author pawn
 */
class internshipRepository {

    protected $internship;
    protected $id;
    protected $term;

    public function __construct(internship $internship) {
        $this->internship = $internship;
    }

    public function getPaginate($n, $id) {
        return $this->internship->where('col_id', '=', $id)->paginate($n);
    }

    public function store(Array $inputs, $col_id) {

        $internship = new internship();

        $internship->theme = $inputs['theme'];
        $internship->col_id = $col_id;
        $internship->save();

        foreach ($inputs['students'] as $student) {
            $internship->student()->attach($student, ['mark' => $inputs['mark']]);
        }

        return $internship;
    }

    public function getById($id) {
        return $this->internship->findOrFail($id);
    }

    public function update(Array $inputs, $id) {
        $internship = $this->getById($id);

        $internship->theme = $inputs['theme'];
        $internship->save();

        $internship->student()->detach();

        foreach ($inputs['students'] as $student) {
            $internship->student()->attach($student, ['mark' => $inputs['mark']]);
        }

        return $internship;
    }

    public function destroy($id) {
        $internship = $this->getById($id);
        $internship->student()->detach();
        return $internship->delete();
    }

    public function searching(Array $inputs, $id) {
        $this->id = $id;
        $this->term = $inputs['term'];
        return $this->internship->with('college')->where('col_id', '=', $id)
                        ->whereRaw('LOWER(`theme`) like ?', '%' . $this->term . '%')->orWhereHas('student', function($q) {
                    $q->whereRaw('LOWER(`firstname`) like ?', '%' . $this->term . '%')->orWhereRaw('LOWER(`lastname`) like ?', '%' . $this->term . '%')
                            ->where('col_id', '=', $this->id);
                })->get();
    }

}
