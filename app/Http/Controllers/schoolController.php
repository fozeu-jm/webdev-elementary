<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\schoolRequest;
use App\Repositories\schoolRepository;
use App\Http\Requests\schoolUpdate;

class schoolController extends Controller {

    protected $schoolRepository;
    protected $nbrPerPage = 16;

    public function __construct(schoolRepository $schoolRepository) {
        $this->middleware('auth');
        $this->middleware('root');
        $this->schoolRepository = $schoolRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $colleges = $this->schoolRepository->getPaginate($this->nbrPerPage);
        $links = $colleges->render();
        
        return view('all-college', compact('colleges','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('add-college');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(schoolRequest $request) {
        $school = $this->schoolRepository->store($request->all());
        $message = "L'école ".$school->name.' a été ajouté avec succès';
        $colleges = $this->schoolRepository->getPaginate($this->nbrPerPage);
        $links = $colleges->render();
        return view('all-college', compact('colleges','message','links'));
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
        $college = $this->schoolRepository->getById($id);
        $message = 'Modifier '.$college->name;
        return view('edit-college', compact('college','message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(schoolUpdate $request, $id) {
        $college = $this->schoolRepository->update($id, $request->all());
        $message = "L'école a été mis a jour avec succès";
        $colleges = $this->schoolRepository->getPaginate($this->nbrPerPage);
        $links = $colleges->render();
        return view('all-college', compact('colleges','message','links'));
    }
    
    public function search(Request $request){
        $colleges=$this->schoolRepository->searching($request->all());
        $message = 'Résultat de la recherche pour "'.$request->input('term').'"';
        $links = '';
        return view('all-college', compact('colleges','message','links'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->schoolRepository->destroy($id);
        $colleges = $this->schoolRepository->getPaginate($this->nbrPerPage);
        $links = $colleges->render();
        $message = 'Supression effectué avec succès';
        return view('all-college',compact('colleges','message','links'));
    }

}
