<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\course;

/**
 * Description of courseRepository
 *
 * @author pawn
 */
class courseRepository {

    protected $course;
    protected $term;

    public function __construct(course $course) {
        $this->course = $course;
    }

    public function store($id, Array $inputs) {
        $course = new $this->course;

        $course->name = $inputs['name'];
        $course->coefficient = $inputs['coefficient'];
        $course->col_id = $id;
        $course->save();


        foreach ($inputs['levels'] as $level) {
            $course->level()->attach($level);
        }

        foreach ($inputs['professor'] as $prof) {
            $course->professor()->attach($prof);
        }


        return $course;
    }

    public function getPaginate($n, $id) {
        return $this->course->where('col_id', '=', $id)->paginate($n);
    }
    
    public function getAll( $id) {
        return $this->course->where('col_id', '=', $id)->get();
    }

    public function getById($id) {
        return $this->course->findOrFail($id);
    }

    public function getRelatedLevels($id) {
        return $this->getById($id);
    }

    public function update($id, Array $inputs) {
        $course = $this->getById($id);

        $course->name = $inputs['name'];
        $course->coefficient = $inputs['coefficient'];
        
        $course->save();
        
        $course->level()->detach();
        $course->professor()->detach();
        
        
        foreach ($inputs['levels'] as $level) {
            $course->level()->attach($level);
        }
        
        foreach ($inputs['professor'] as $prof) {
            $course->professor()->attach($prof);
        }

        return $course;
    }

    public function destroy($id) {
        $course = $this->getById($id);
        
        $course->level()->detach();
        $course->professor()->detach();
        return $course->delete();
    }

    public function searching(Array $inputs, $id) {
        $this->term = $inputs['term'];
        $this->id = $id;
        return $this->course->with('college')->whereRaw('LOWER(`name`) like ?', '%' . $this->term . '%')
                        ->where('col_id', '=', $id)->get();
    }

}
