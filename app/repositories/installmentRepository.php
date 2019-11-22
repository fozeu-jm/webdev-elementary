<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\installments;

/**
 * Description of installmentRepository
 *
 * @author pawn
 */
class installmentRepository {

    protected $installments;
    protected $term;
    protected $id;

    public function __construct(installments $installments) {
        $this->installments = $installments;
    }

    public function getPaginate($n, $id) {
        return $this->installments->where('col_id', '=', $id)->paginate($n);
    }
    
    public function getAll($id){
        return $this->installments->where('col_id', '=', $id)->get();
    }

    public function store(Array $inputs, $id) {
        $installment = new $this->installments;

        $installment->col_id = $id;

        $installment->aca_id = $inputs['academic'];
        $installment->label = $inputs['label'];
        $installment->amount = $inputs['amount'];
        $installment->level = $inputs['level'];
        $installment->dateline = $inputs['dateline'];
        $installment->save();

        return $installment;
    }

    public function getById($id) {
        return $this->installments->findOrFail($id);
    }

    public function update(Array $inputs, $id) {
        $installment = $this->getById($id);

        $installment->aca_id = $inputs['academic'];
        $installment->label = $inputs['label'];
        $installment->amount = $inputs['amount'];
        $installment->level = $inputs['level'];
        $installment->dateline = $inputs['dateline'];
        return $installment->save();
    }
    
    public function delete($id){
        return $this->getById($id)->delete();
    }
    
    public function searching(Array $inputs,$id){
        $this->term = $inputs['term'];
        $this->id = $id;
        return $this->installments->with('college')->whereRaw('LOWER(`label`) like ?', '%' . $this->term . '%')
                        ->where('col_id', '=', $id)->get();
    }

}
