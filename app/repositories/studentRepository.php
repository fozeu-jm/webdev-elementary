<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Student;
use App\attendance;
use App\averages;
use App\student_course;

/**
 * Description of studentRepository
 *
 * @author pawn
 */
class studentRepository {

    protected $student;
    protected $term;
    protected $academic;
    protected $level;
    protected $id;
    protected $attendance;
    protected $average;
    protected $student_course;
    protected $aca_id;
    protected $lvl_id;

    public function __construct(Student $student, attendance $attendance, averages $average, student_course $student_course) {
        $this->student = $student;
        $this->attendance = $attendance;
        $this->average = $average;
        $this->student_course = $student_course;
    }

    public function getPaginate($n, $id) {
        return $this->student->where('col_id', '=', $id)->paginate($n);
    }

    public function getAll($id) {
        return $this->student->where('col_id', '=', $id)->get();
    }

    public function getById($id) {
        return $this->student->findOrFail($id);
    }

    public function store(Array $inputs, $id, $picture = null) {
        $student = new Student();

        $student->col_id = $id;
        $student->lev_id = $inputs['level'];
        $student->aca_id = $inputs['academic'];

        $student->firstname = $inputs['firstname'];
        $student->lastname = $inputs['lastname'];
        $student->datebirth = $inputs['datebirth'];
        $student->gender = $inputs['gender'];
        $student->email = $inputs['email'];
        $student->phoneno = $inputs['phoneno'];
        $student->levels = $inputs['niveau'];
        $student->adress = $inputs['adress'];
        $student->emergency = $inputs['emergency'];
        $student->birthplace = $inputs['birthplace'];
        $student->nationality = $inputs['nationality'];

        if (!is_null($picture)) {
            $student->picture = $picture;
        }

        $student->save();

        return $student;
    }

    public function update(array $inputs, $id, $picture = null) {
        $student = $this->getById($id);

        $student->lev_id = $inputs['level'];
        $student->aca_id = $inputs['academic'];

        $student->firstname = $inputs['firstname'];
        $student->lastname = $inputs['lastname'];
        $student->datebirth = $inputs['datebirth'];
        $student->gender = $inputs['gender'];
        $student->email = $inputs['email'];
        $student->phoneno = $inputs['phoneno'];
        $student->levels = $inputs['niveau'];
        $student->adress = $inputs['adress'];
        $student->emergency = $inputs['emergency'];
        $student->birthplace = $inputs['birthplace'];
        $student->nationality = $inputs['nationality'];
        if (!is_null($picture)) {
            $student->picture = $picture;
        }

        return $student->save();
    }

    public function destroy($id) {
        return $this->getById($id)->delete();
    }

    public function searching(Array $inputs, $id) {

        if (isset($inputs['term'])) {
            $this->term = $inputs['term'];
            $this->id = $id;
            return $this->student->with('college')->whereRaw('LOWER(`firstname`) like ?', '%' . $this->term . '%')
                            ->orWhereRaw('LOWER(`lastname`) like ?', '%' . $this->term . '%')->where('col_id', '=', $id)->get();
        } else {
            $this->level = $inputs['level'];
            $this->academic = $inputs['academic'];
            $this->id = $id;
            return $this->student->with('college')->where('lev_id', '=', $this->level)
                            ->Where('aca_id', '=', $this->academic)->where('col_id', '=', $this->id)->get();
        }
    }

    public function noting(Array $inputs, $id, $intern_percent) {
        $student = $this->getById($id);
        $i = 0;
        $student->course()->detach();
        while (true) {
            if (isset($inputs['subject-' . $i])) {
                if (isset($inputs['mark-' . $i])) {
                    $student->course()->attach($inputs['subject-' . $i], ['mark' => $inputs['mark-' . $i]]);
                    $i++;
                } else {
                    $i++;
                }
            } else {
                break;
            }
        }

        $total_coefficient = 0;
        $total_mark = 0;
        foreach ($student->course as $subject) {
            $total_mark += $subject->pivot->mark * $subject->coefficient;
            $total_coefficient += $subject->coefficient;
        }

        $average = $total_mark / $total_coefficient;

        $internship_mark = null;
        foreach ($student->internship as $intern) {
            $internship_mark = $intern->pivot->mark;
            break;
        }

        if (!is_null($internship_mark)) {
            $school_percent = 100 - $intern_percent;
            $first = $average * ($school_percent / 100);
            $second = $internship_mark * ($intern_percent / 100);
            $final = $first + $second;
            $test = $this->average->where('stu_id', '=', $student->id);
            if (isset($test)) {
                $test->delete();
                $object = new averages();
                $object->stu_id = $student->id;
                $object->level_id = $student->lev_id;
                $object->average = $final;
                $object->save();
            } else {
                $object = new averages();
                $object->stu_id = $student->id;
                $object->level_id = $student->lev_id;
                $object->average = $final;
                $object->save();
            }
        } else {
            $test = $this->average->where('stu_id', '=', $student->id);
            if (isset($test)) {
                $test->delete();
                $object = new averages();
                $object->stu_id = $student->id;
                $object->level_id = $student->lev_id;
                $object->average = $average;
                $object->save();
            } else {
                $object = new averages();
                $object->stu_id = $student->id;
                $object->level_id = $student->lev_id;
                $object->average = $average;
                $object->save();
            }
        }

        return $student;
    }

    public function noInternAvg($student) {
        $total_coefficient = 0;
        $total_mark = 0;
        foreach ($student->course as $subject) {
            $total_mark += $subject->pivot->mark * $subject->coefficient;
            $total_coefficient += $subject->coefficient;
        }

        $average = $total_mark / $total_coefficient;
        return $average;
    }

    public function abscences(Array $inputs, $id) {
        $student = $this->getById($id);
        $attendance = $this->attendance->where('student_id', '=', $id);
        if (isset($attendance)) {
            $attendance->delete();
            $present = new attendance();
            $present->abscences = $inputs['abscences'];
            $present->student_id = $inputs['student'];
            $present->save();
            return $present;
        } else {
            $present = new attendance();
            $present->abscences = $inputs['abscences'];
            $present->student_id = $inputs['student'];
            $present->save();
            return $present;
        }
    }

    public function subjectRank($course_id, $mark, $lvl_id, $aca_id) {
        $this->aca_id = $aca_id;
        $this->lvl_id = $lvl_id;
        $resultset = $this->student_course->with('student', 'course')->where('mark', '>', $mark)->where('course_id', '=', $course_id)
                        ->whereHas('student', function($q) {
                            $q->where('lev_id', '=', $this->lvl_id)->where('aca_id', '=', $this->aca_id);
                        })->get();
        return $resultset->count() + 1;
    }

    public function subjectClassAverage($course_id, $lvl_id, $aca_id) {
        $this->aca_id = $aca_id;
        $this->lvl_id = $lvl_id;
        $results = $this->student_course->with('student', 'course')->where('course_id', '=', $course_id)
                        ->whereHas('student', function($q) {
                            $q->where('lev_id', '=', $this->lvl_id)->where('aca_id', '=', $this->aca_id);
                        })->get();

        $i = $results->count();
        $mark = 0;
        foreach ($results as $item) {
            $mark += $item->mark;
        }
        $avg = $mark / $i;
        return $avg;
    }

    public function studentRank($lvl_id, $aca_id, $average) {
        $this->lvl_id = $lvl_id;
        $this->aca_id = $aca_id;
        $results = $this->average->with('student')->where('average', '>', $average)->where('level_id', '=', $lvl_id)
                        ->whereHas('student', function($q) {
                            $q->where('aca_id', '=', $this->aca_id);
                        })->get();
        return $results->count() + 1;
    }

    public function classAverage($lvl_id, $aca_id) {
        $this->lvl_id = $lvl_id;
        $this->aca_id = $aca_id;
        $results = $this->average->with('student')->where('level_id', '=', $lvl_id)
                        ->whereHas('student', function($q) {
                            $q->where('aca_id', '=', $this->aca_id);
                        })->get();
        $i = 0;
        $mark = 0;
        foreach ($results as $item) {
            $mark += $item->average;
            $i++;
        }
        $avg = $mark / $i;
        return $avg;
    }

    public function maximum($lvl_id, $aca_id) {
        $this->lvl_id = $lvl_id;
        $this->aca_id = $aca_id;
        $results = $this->average->with('student')->where('level_id', '=', $lvl_id)
                        ->whereHas('student', function($q) {
                            $q->where('aca_id', '=', $this->aca_id);
                        })->max('average');

        return $results;
    }

    public function minimum($lvl_id, $aca_id) {
        $this->lvl_id = $lvl_id;
        $this->aca_id = $aca_id;
        $results = $this->average->with('student')->where('level_id', '=', $lvl_id)
                        ->whereHas('student', function($q) {
                            $q->where('aca_id', '=', $this->aca_id);
                        })->min('average');

        return $results;
    }

    public function studentAvg($std_id) {
        $results = $this->average->where('stu_id', '=', $std_id)->first();

        return $results->average;
    }

    public function getAbscences($id) {
        $student = $this->getById($id);
        $attendance = $this->attendance->where('student_id', '=', $id)->first();
        return $attendance->abscences;
    }

    public function getIntern($id) {
        $student = $this->getById($id);
        
        $internship_mark = null;
        foreach ($student->internship as $intern) {
            $internship_mark = $intern->pivot->mark;
            break;
        }
        
        return $internship_mark;
    }
    
    public function getCount($lvl_id, $aca_id) {
        $this->lvl_id = $lvl_id;
        $this->aca_id = $aca_id;
        $results = $this->average->with('student')->where('level_id', '=', $lvl_id)
                        ->whereHas('student', function($q) {
                            $q->where('aca_id', '=', $this->aca_id);
                        })->get();
       
        return $results->count();
    }

}
