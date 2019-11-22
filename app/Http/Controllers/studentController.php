<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\academicRepository;
use App\Repositories\levelRepository;
use App\Repositories\studentRepository;
use App\Http\Requests\addStudent;
use App\Repositories\settingsRepository;

class studentController extends Controller {

    protected $academicRepository;
    protected $levelRepository;
    protected $studentRepository;
    protected $settingsRepository;
    protected $nbrPage = 16;

    public function __construct(academicRepository $academicRepository, levelRepository $levelRepository, studentRepository $studentRepository, settingsRepository $settingsRepository) {
        $this->middleware('auth');
        $this->academicRepository = $academicRepository;
        $this->levelRepository = $levelRepository;
        $this->studentRepository = $studentRepository;
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $students = $this->studentRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $students->render();
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        return view('all-students', compact('students', 'links', 'academics', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        return view('add-student', compact('academics', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addStudent $request) {
        $image = $request->file('picture');
        if (!is_null($image)) {
            $chemin = config('images.path');

            $extension = $image->getClientOriginalExtension();
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($extension, $allowed)) {
                return redirect('add-student')->with('error', "L'image envoyée doit etre au format jpg ou png !");
            }

            do {
                $name = str_random(10) . '.' . $extension;
            } while (file_exists($chemin . '/' . $name));

            if ($image->move($chemin, $name)) {
                $this->studentRepository->store($request->all(), auth()->user()->col_id, $name);
                return redirect('students')->with('message', 'Operation effectué avec succès !');
            } else {
                return redirect('add-student')->with('error', 'Désolé mais votre image ne peut pas être envoyée !');
            }
        } else {
            $this->studentRepository->store($request->all(), auth()->user()->col_id);
            return redirect('students')->with('message', 'Operation effectué avec succès !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $student = $this->studentRepository->getById($id);
        if ($student->col_id == auth()->user()->col_id) {
            return view('show-student', compact('student'));
        } else {
            return redirect('students')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $student = $this->studentRepository->getById($id);
        if ($student->col_id == auth()->user()->col_id) {
            $academics = $this->academicRepository->getAll(auth()->user()->col_id);
            $levels = $this->levelRepository->getAll(auth()->user()->col_id);
            return view('edit-student', compact('academics', 'levels', 'student'));
        } else {
            return redirect('students')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(addStudent $request, $id) {
        $image = $request->file('picture');
        if (!is_null($image)) {
            $chemin = config('images.path');

            $extension = $image->getClientOriginalExtension();
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($extension, $allowed)) {
                return redirect('add-student')->with('error', "L'image envoyée doit etre au format jpg ou png !");
            }

            do {
                $name = str_random(10) . '.' . $extension;
            } while (file_exists($chemin . '/' . $name));

            if ($image->move($chemin, $name)) {
                $this->studentRepository->update($request->all(), $id, $name);
                return redirect('students')->with('message', 'Operation effectué avec succès !');
            } else {
                return redirect('add-student')->with('error', 'Désolé mais votre image ne peut pas être envoyée !');
            }
        } else {
            $this->studentRepository->update($request->all(), $id, null);
            return redirect('students')->with('message', 'Operation effectué avec succès !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->studentRepository->destroy($id);
        return redirect('students')->with('message', 'Operation effectué avec succès !');
    }

    public function search(Request $request) {
        $students = $this->studentRepository->searching($request->all(), auth()->user()->col_id);
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        $links = '';
        return view('all-students', compact('students', 'academics', 'levels','links'));
    }

    public function notes() {
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        return view('choose-note', compact('academics', 'levels'));
    }

    public function filter(Request $request) {
        $students = $this->studentRepository->searching($request->all(), auth()->user()->col_id);
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        return view('filter-results', compact('students', 'academics', 'levels'));
    }

    public function fill($id) {
        $student = $this->studentRepository->getById($id);
        $level = $this->levelRepository->getById($student->lev_id);
        return view('enter-notes', compact('student', 'level'));
    }

    public function saveNotes(Request $request, $id) {
        $student = $this->studentRepository->getById($id);
        if ($student->col_id == auth()->user()->col_id) {
            $setting = $this->settingsRepository->getById(auth()->user()->col_id);
            $this->studentRepository->noting($request->all(), $id, $setting->intern_percent);
            return redirect('students/searchform')->with('message', "Operations effectué avec succès");
        } else {
            return redirect('students/searchform')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }

    public function attendance() {
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        return view('choose-attendance', compact('academics', 'levels'));
    }

    public function filterPresence(Request $request) {
        $students = $this->studentRepository->searching($request->all(), auth()->user()->col_id);
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        return view('attendance-result', compact('students', 'academics', 'levels'));
    }

    public function fillAttendance($id) {
        $student = $this->studentRepository->getById($id);
        $level = $this->levelRepository->getById($student->lev_id);
        return view('enter-attendance', compact('student', 'level'));
    }

    public function saveAbscence(Request $request, $id) {
        $student = $this->studentRepository->getById($id);
        if ($student->col_id == auth()->user()->col_id) {
            $this->studentRepository->abscences($request->all(), $id);
            return redirect('students/attendanceform')->with('message', "Operations effectué avec succès");
        } else {
            return redirect('students/attendanceform')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }

    public function printReport(Request $request, $id) {
        
        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        }
        $student = $this->studentRepository->getById($id);
        $inputs = $request->all();
        $setting = $this->settingsRepository->getById(auth()->user()->col_id);
        $subjects = array();

        foreach ($student->course as $course) {
            $subjectRank = $this->studentRepository->subjectRank($course->id, $course->pivot->mark, $student->level->id, $student->academicYear->id);
            $subjectClassAverage = $this->studentRepository->subjectClassAverage($course->id, $student->lev_id, $student->aca_id);
            $sub = array(
                'subject' => $course,
                'subRank' => $subjectRank,
                'subAvg' => $subjectClassAverage
            );
            array_push($subjects, $sub);
        }

        $classAverage = $this->studentRepository->classAverage($student->lev_id, $student->aca_id);
        $average = $this->studentRepository->studentAvg($student->id);
        $studentRank = $this->studentRepository->studentRank($student->lev_id, $student->aca_id, $average);
        $min = $this->studentRepository->minimum($student->lev_id, $student->aca_id);
        $max = $this->studentRepository->maximum($student->lev_id, $student->aca_id);
        $nointern = $this->studentRepository->noInternAvg($student);
        $abscences = $this->studentRepository->getAbscences($student->id);
        $internmark = $this->studentRepository->getIntern($student->id);
        $stdcount = $this->studentRepository->getCount($student->level->id, $student->academicYear->id);

        return view('print-card', compact('internmark', 'stdcount', 'abscences', 'nointern', 'student', 'inputs', 'setting', 'subjects', 'classAverage', 'studentRank', 'min', 'max', 'average'));
    }

}
