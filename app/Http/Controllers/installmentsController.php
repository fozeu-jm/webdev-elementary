<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\installmentRepository;
use App\Repositories\academicRepository;

class installmentsController extends Controller {

    protected $installmentRpository;
    protected $academicRepository;
    protected $nbrPage = 16;

    public function __construct(installmentRepository $installmentRepository, academicRepository $academicRepository) {
        $this->middleware('auth');
        $this->installmentRpository = $installmentRepository;
        $this->academicRepository = $academicRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $installments = $this->installmentRpository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $installments->render();
        return view('all-installments', compact('installments', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);
        return view('add-installment', compact('academics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->installmentRpository->store($request->all(), auth()->user()->col_id);

        return redirect('installments')->with('message', 'Operation effectué avec succès !');
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
        $installment = $this->installmentRpository->getById($id);
        $academics = $this->academicRepository->getAll(auth()->user()->col_id);

        if ($installment->col_id == auth()->user()->col_id) {
            return view('edit-installment', compact('installment', 'academics'));
        } else {
            return redirect('installments')->with('message', "Vous n'avez pas accèss a ces données");
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
        $this->installmentRpository->update($request->all(), $id);

        return redirect('installments')->with('message', 'Operation effectué avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $installment = $this->installmentRpository->getById($id);

        if ($installment->col_id == auth()->user()->col_id) {
            $this->installmentRpository->delete($id);
            return redirect('installments')->with('message', 'Operation effectué avec succès !');
        } else {
            return redirect('installments')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }

    public function search(Request $request) {
        $installments = $this->installmentRpository->searching($request->all(), auth()->user()->col_id);
        $links="";
        return view('all-installments', compact('installments','links'));
    }

}
