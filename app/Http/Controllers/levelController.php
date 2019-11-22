<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\levelRepository;
use App\Http\Requests\addlevel;
use App\Http\Requests\updatelevel;

class levelController extends Controller {

    protected $levelRepository;
    protected $nbrPerPage = 5;
    protected $niveaux;

    public function __construct(levelRepository $levelRepository) {
        $this->middleware('auth');
        $this->levelRepository = $levelRepository;
        $this->niveaux = array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $levels = $this->levelRepository->getPaginate($this->nbrPerPage, auth()->user()->col_id);
        $links = $levels->render();
        return view('all-levels', compact('levels','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $niveaux = $this->niveaux;
        return view('add-level', compact('niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addlevel $request) {
        $niveau = $this->levelRepository->store($request->all(), auth()->user()->col_id);
        $levels = $this->levelRepository->getPaginate($this->nbrPerPage, auth()->user()->col_id);
        $message = 'Operation effectué avec succès';
        $links = $levels->render();
        return view('all-levels', compact('levels', 'message','links'));
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
        $level = $this->levelRepository->getById($id);
        $niveaux = $this->niveaux;
        return view('edit-level', compact('level', 'niveaux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatelevel $request, $id) {
        $this->levelRepository->update($id, $request->all());
        $levels = $this->levelRepository->getPaginate($this->nbrPerPage, auth()->user()->col_id);
        $message = 'Operation effectué avec succès';
        $links = $levels->render();
        return view('all-levels', compact('levels', 'message','links'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->levelRepository->delete($id);
        $levels = $this->levelRepository->getPaginate($this->nbrPerPage, auth()->user()->col_id);
        $links = $levels->render();
        $message = 'Operation effectué avec succès';
        return view('all-levels', compact('levels', 'message','links'));
    }
    
     public function search(Request $request) {
        $levels = $this->levelRepository->searching($request->all(), auth()->user()->col_id);
        $message = 'Résultat de la recherche pour "' . $request->input('term') . '"';
        $links ='';
        return view('all-levels', compact('levels', 'message','links'));
    }

}
