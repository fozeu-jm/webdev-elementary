<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\courseRepository;
use App\Repositories\professorRepository;
use App\Repositories\levelRepository;

class courseController extends Controller {

    protected $courseRepository;
    protected $professorRepository;
    protected $levelRepository;
    protected $nbrPage = 16;

    public function __construct(courseRepository $courseRepository, professorRepository $professorRepository, levelRepository $levelRepository) {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->professorRepository = $professorRepository;
        $this->levelRepository = $levelRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $courses = $this->courseRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $courses->render();
        return view('all-courses', compact('courses','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $professors = $this->professorRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        return view('add-course',compact('professors','levels'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $course = $this->courseRepository->store(auth()->user()->col_id, $request->all());
        $message = 'Opération effectué avec succès';
        $courses = $this->courseRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $courses->render();
        return view('all-courses', compact('courses','links'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $professors = $this->professorRepository->getAll(auth()->user()->col_id);
        $levels = $this->levelRepository->getAll(auth()->user()->col_id);
        $course = $this->courseRepository->getRelatedLevels($id);
        return view('edit-course', compact('professors','levels','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->courseRepository->update($id,$request->all());
        $message = 'Opération effectué avec succès';
        $courses = $this->courseRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $courses->render();
        return view('all-courses', compact('courses','links'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->courseRepository->destroy($id);
        $message = 'Opération effectué avec succès';
        $courses = $this->courseRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $courses->render();
        return view('all-courses', compact('courses','links'));
    }
    
    public function search(Request $request){
        $courses = $this->courseRepository->searching($request->all(), auth()->user()->col_id);
        $links='';
        $message = 'Opération effectué avec succès';
        return view('all-courses', compact('courses','links'));
    }

}
