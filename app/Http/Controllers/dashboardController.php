<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\studentRepository;
use App\Repositories\professorRepository;
use App\Repositories\levelRepository;
use App\Repositories\courseRepository;

class dashboardController extends Controller
{
    protected $studentRepository;
    protected $professorRepository;
    protected $levelRepository;
    protected $courseRepository;


    public function __construct(studentRepository $studentRepository, professorRepository $professorRepository, levelRepository $levelRepository, courseRepository $courseRepository) {
        $this->middleware('auth');
        $this->studentRepository = $studentRepository;
        $this->professorRepository = $professorRepository;
        $this->levelRepository = $levelRepository;
        $this->courseRepository = $courseRepository;
    }
    public function index(){
        $students = $this->studentRepository->getAll(auth()->user()->col_id);
        $professors = $this->professorRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        $courses = $this->courseRepository->getAll(auth()->user()->col_id);
        return view('dashboard', compact('students','professors','levels','courses'));
    }
}
