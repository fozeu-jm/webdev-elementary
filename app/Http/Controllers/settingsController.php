<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\settingsRepository;
use App\Http\Requests\addStudent;

class settingsController extends Controller {

    protected $settingsRepository;

    public function __construct(settingsRepository $settingsRepository) {
        $this->middleware('auth');
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $setting = $this->settingsRepository->getById(auth()->user()->col_id);
        return view('settings', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(addStudent $request, $id) {
        $image = $request->file('logo');
        if (!is_null($image)) {
            $chemin = config('images.path');

            $extension = $image->getClientOriginalExtension();
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($extension, $allowed)) {
                return redirect('add-student')->with('error', "L'image envoyée doit etre au format jpg ou png !");
            }

            do {
                $name = str_random(10) . '.' . $extension;
            } while (file_exists($chemin . '/' . $name));

            if ($image->move($chemin, $name)) {
                $this->settingsRepository->update($request->all(), $id, $name);
                return redirect('settings')->with('message', 'Operation effectué avec succès !');
            } else {
                return redirect('settings')->with('message', 'Désolé mais votre image ne peut pas être envoyée !');
            }
        } else {
            $this->settingsRepository->update($request->all(), $id, null);
            return redirect('settings')->with('message', 'Operation effectué avec succès !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
