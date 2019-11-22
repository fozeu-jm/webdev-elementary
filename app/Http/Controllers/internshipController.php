<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\internshipRepository;
use App\Repositories\studentRepository;

class internshipController extends Controller {

    protected $internshipRepository;
    protected $studentRepository;
    protected $nbrPage = 16;

    public function __construct(internshipRepository $internshipRepository, studentRepository $studentRepository) {
        
        $this->middleware('auth');
        $this->internshipRepository = $internshipRepository;
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $internships = $this->internshipRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $internships->render();
        return view('all-internships', compact('internships', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $students = $this->studentRepository->getAll(auth()->user()->col_id);
        return view('add-internship', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->internshipRepository->store($request->all(), auth()->user()->col_id);
        return redirect('internships')->with('message', "Operation effectué avec succès");
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
        $students = $this->studentRepository->getAll(auth()->user()->col_id);
        $internship = $this->internshipRepository->getById($id);
        if($internship->col_id == auth()->user()->col_id){
            return view('edit-internship',compact('students','internship'));
        }else{
            return redirect('internships')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->internshipRepository->update($request->all(), $id);
        return redirect('internships')->with('message', "Operation effectué avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->internshipRepository->destroy($id);
        return redirect('internships')->with('message', "Operation effectué avec succès");
    }
    
    public function search(Request $request){
        $internships = $this->internshipRepository->searching($request->all(), auth()->user()->col_id);
        $links = "";
        return view('all-internships', compact('internships','links'));
    }

}
