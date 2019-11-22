<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\academicRepository;

class academicController extends Controller {

    private $academicRepository;
    protected $nbrPerPage = 16;

    public function __construct(academicRepository $academicRepository) {
        $this->middleware('auth');
        $this->academicRepository = $academicRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $academics = $this->academicRepository->getpaginate($this->nbrPerPage, auth()->user()->col_id);
        $links = $academics->render();
        return view('all-academic', compact('academics', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $years = array();
        for ($i = 2016; $i < 2031; $i++) {
            array_push($years, $i);
        }
        return view('add-academic', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $academic = $this->academicRepository->store(auth()->user()->col_id, $request->all());
        $message = 'Operation effectué avec succès';
        $academics = $this->academicRepository->getpaginate($this->nbrPerPage, auth()->user()->col_id);
        $links = $academics->render();
        return view('all-academic', compact('academics', 'links', 'message'));
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
        $years = array();
        for ($i = 2016; $i < 2031; $i++) {
            array_push($years, $i);
        }
        $academic = $this->academicRepository->getById($id);
        return view('edit-academic', compact('academic', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->academicRepository->update($id, $request->all());
        $message = 'Operation effectué avec succès';
        $academics = $this->academicRepository->getpaginate($this->nbrPerPage, auth()->user()->col_id);
        $links = $academics->render();
        return view('all-academic', compact('academics', 'links', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->academicRepository->destroy($id);
        $message = 'Operation effectué avec succès';
        $academics = $this->academicRepository->getpaginate($this->nbrPerPage, auth()->user()->col_id);
        $links = $academics->render();
        return view('all-academic', compact('academics', 'links', 'message'));
    }

}
