<?php

namespace App\Repositories;

use App\User;

class userRepository {

    protected $user;
    private $term;
    private $id;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getPaginate($n) {

        /*
         * return $this->post->with('user')
          ->orderBy('posts.created_at', 'desc')
          ->paginate($n);
         */

        return $this->user->with('college')->paginate($n);
    }

    public function getNega($id, $n) {
        return $this->user->with('college')->where('col_id', '=', $id)->paginate($n);
    }

    public function searching(Array $inputs, $role, $id) {
        $this->term = $inputs['term'];
        $this->id = $id;
        if ($role == 'root') {
            return $this->user->with('college')->whereRaw('LOWER(`name`) like ?', array($this->term))->orWhereHas('college', function($q) {
                        $q->whereRaw('LOWER(`name`) like ?', '%'.$this->term.'%');
                    })->get();
        } else {
            return $this->user->with('college')->where('col_id', '=', $id)
                            ->whereRaw('LOWER(`name`) like ?', '%'.$this->term.'%')->orWhereHas('college', function($q) {
                        $q->whereRaw('LOWER(`name`) like ?', '%'.$this->term.'%')->where('id', '=', $this->id);
                    })->get();
        }
    }

    public function store($col, Array $inputs) {
        $user = new $this->user;

        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->password = bcrypt($inputs['password']);
        $user->col_id = $col;
        $user->role = $inputs['role'];
        $user->save();
        return $user;
    }

    public function getById($id) {
        return $this->user->findOrFail($id);
    }

    public function update($id, Array $inputs) {
        $user = $this->getById($id);

        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        if (isset($inputs['password'])) {
            $user->password = bcrypt($inputs['password']);
        }

        return $user->save();
    }

    public function delete($id) {

        return $this->getById($id)->delete();
    }

}
