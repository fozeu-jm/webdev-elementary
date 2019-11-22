<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\professorRepository;
use App\Http\Requests\addProfessor;

class professorController extends Controller {

    protected $professorRepository;
    protected $nbrPage = 16;
    protected $id;

    public function __construct(professorRepository $professorRepository) {
        $this->middleware('auth');
        $this->professorRepository = $professorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $professors = $this->professorRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $professors->render();
        return view('all-professors', compact('professors', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('add-professor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addProfessor $request) {
        $prof = $this->professorRepository->store(auth()->user()->col_id, $request->all());
        $message = 'Operation effectué avec succès';
        $professors = $this->professorRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $professors->render();
        return view('all-professors', compact('professors', 'links', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $professor = $this->professorRepository->getById($id);
        return view('show-professor',compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $professor = $this->professorRepository->getById($id);
        return view('edit-professor', compact('professor'));
    }

    public function search(Request $request) {
        $professors = $this->professorRepository->searching($request->all(), auth()->user()->col_id);
        $message = 'Résultat de la recherche pour "' . $request->input('term') . '"';
        $links='';
        return view('all-professors', compact('professors', 'message', 'links'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->professorRepository->update($id, $request->all());
        $message = 'Operation effectué avec succès';
        $professors = $this->professorRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $professors->render();
        return view('all-professors', compact('professors', 'links', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->professorRepository->destroy($id);
        $message = 'Operation effectué avec succès';
        $professors = $this->professorRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $professors->render();
        return view('all-professors', compact('professors', 'links', 'message'));
    }

}
