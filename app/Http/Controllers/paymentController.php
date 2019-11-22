<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\installmentRepository;
use App\Repositories\studentRepository;
use App\Repositories\paymentRepository;

class paymentController extends Controller {

    protected $studentRepository;
    protected $installmentRepository;
    protected $paymentRepository;
    protected $nbrPage = 16;

    public function __construct(installmentRepository $installmentRepository, studentRepository $studentRepository, paymentRepository $paymentRepository) {
        $this->middleware('auth');
        $this->installmentRepository = $installmentRepository;
        $this->studentRepository = $studentRepository;
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $payments = $this->paymentRepository->getPaginate($this->nbrPage, auth()->user()->col_id);
        $links = $payments->render();
        return view('all-payments', compact('payments', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $installments = $this->installmentRepository->getAll(auth()->user()->col_id);
        $students = $this->studentRepository->getAll(auth()->user()->col_id);
        return view('add-payment', compact('installments', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->paymentRepository->store($request->all(), auth()->user()->col_id);

        return redirect('payments')->with('message', 'Operation effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $payment = $this->paymentRepository->getById($id);

        if ($payment->col_id == auth()->user()->col_id) {
            return view('show-payment', compact('payment'));
        } else {
            return redirect('payments')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $payment = $this->paymentRepository->getById($id);
        $installments = $this->installmentRepository->getAll(auth()->user()->col_id);
        $students = $this->studentRepository->getAll(auth()->user()->col_id);

        if ($payment->col_id == auth()->user()->col_id) {
            return view('edit-payment', compact('payment', 'installments', 'students'));
        } else {
            return redirect('paymentments')->with('message', "Vous n'avez pas accèss a ces données");
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
        $this->paymentRepository->update($request->all(), $id);

        return redirect('payments')->with('message', 'Operation effectué avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $payment = $this->paymentRepository->getById($id);

        if ($payment->col_id == auth()->user()->col_id) {
            $payment->delete($id);
            return redirect('payments')->with('message', 'Operation effectué avec succès !');
        } else {
            return redirect('payments')->with('message', "Vous n'avez pas accèss a ces données");
        }
    }
    
    public function search (Request $request) {
        $payments = $this->paymentRepository->searching($request->all(), auth()->user()->col_id);
        $links="";
        return view('all-payments', compact('payments','links'));
    }

}
