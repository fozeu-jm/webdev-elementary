<?php

namespace App\Repositories;

use App\User;
use App\College;
use App\settings;

/**
 * Description of schoolRepository
 *
 * @author pawn
 */
class schoolRepository {

    protected $user;
    protected $college;

    public function __construct(College $college, User $user) {
        $this->college = $college;
        $this->user = $user;
    }

    public function store(Array $inputs) {
        $college = new $this->college;
        $user = new $this->user;

        $college->name = $inputs['name'];
        $college->email = $inputs['schoolmail'];
        $college->phoneno = $inputs['tel'];
        $college->po_box = $inputs['box'];
        $college->website = $inputs['website'];
        date_default_timezone_set('Africa/Douala');
        $college->created_at = date('Y-m-d H:i:s');
        $college->save();

        $user->name = $inputs['username'];
        $user->email = $inputs['email'];
        $user->password = bcrypt($inputs['password']);
        $user->role = 'admin';
        $user->col_id = $college->id;
        $user->save();
        
        $setting = new settings();
        $setting->col_id = $college->id;
        $setting->intern_percent = 40;
        $setting->save();
        
        return $college;
    }

    public function getPaginate($n) {
        return $this->college->paginate($n);
    }

    public function searching(Array $inputs) {
        $term = $inputs['term'];
        return $this->college::query()->whereRaw('LOWER(`name`) like ?', array($term))
                        ->get();
    }

    public function getById($id) {
        return $this->college->findOrFail($id);
    }

    public function update($id, Array $inputs) {
        $college = $this->getById($id);

        $college->name = $inputs['name'];
        $college->email = $inputs['email'];
        $college->phoneno = $inputs['phoneno'];
        $college->po_box = $inputs['po_box'];
        $college->website = $inputs['website'];

        return $college->save();
    }

    public function destroy($id) {
        return $this->getById($id)->delete();
    }

}
