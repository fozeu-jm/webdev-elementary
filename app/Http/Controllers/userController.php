<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\userRepository;
use App\Http\Controllers\Auth;
use App\Http\Requests\addUser;
use App\Http\Requests\userUpdate;

class userController extends Controller {

    protected $userRepository;
    protected $nbrPerPage = 16;

    public function __construct(userRepository $userRepository) {
        $this->middleware('auth');
        $this->middleware('root', ['only' => 'negaindex']);
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = $this->userRepository->getNega(auth()->user()->col_id, $this->nbrPerPage);
        $links = $users->render();
        return view('all-users', compact('users', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('add-user');
    }

    public function negaindex() {
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();
        return view('all-users', compact('users', 'links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addUser $request) {
        $user = $this->userRepository->store(auth()->user()->col_id, $request->all());
        $message = "L'utilisateur " . $user->email . ' a été ajouté avec succès';
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();
        return view('all-user', compact('users', 'message', 'links'));
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

    public function search(Request $request) {
        $users = $this->userRepository->searching($request->all(), auth()->user()->role, auth()->user()->col_id);
        $message = 'Résultat de la recherche pour "' . $request->input('term') . '"';
        $links = '';
        return view('all-users', compact('users', 'message','links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = $this->userRepository->getById($id);
        $message = "Modifier l'utilisateur " . $user->name;
        return view('edit-user', compact('user', 'message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userUpdate $request, $id) {
        $user = $this->userRepository->update($id, $request->all());
        $message = "L'école a été mis a jour avec succès";
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();
        return view('all-users', compact('users', 'message', 'links'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->userRepository->delete($id);
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();
        $message = 'Supression effectué avec succès';
        return view('all-users', compact('users', 'message','links'));
    }

}
