<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\payment;

/**
 * Description of paymentRepository
 *
 * @author pawn
 */
class paymentRepository {

    protected $payment;
    protected $term;
    protected $id;

    public function __construct(payment $payment) {
        $this->payment = $payment;
    }

    public function getPaginate($n, $id) {
        return $this->payment->where('col_id', '=', $id)->paginate($n);
    }

    public function getAll($id) {
        return $this->payment->where('col_id', '=', $id)->get();
    }

    public function store(Array $inputs, $id) {
        $payment = new $this->payment;

        $payment->col_id = $id;
        $payment->stu_id = $inputs['student'];
        $payment->ins_id = $inputs['installment'];

        $payment->date = $inputs['date'];
        $payment->receiptno = $inputs['receiptno'];

        $payment->save();

        return $payment;
    }

    public function getById($id) {
        return $this->payment->findOrFail($id);
    }

    public function update(Array $inputs, $id) {
        $payment = $this->getById($id);

        $payment->stu_id = $inputs['student'];
        $payment->ins_id = $inputs['installment'];

        $payment->date = $inputs['date'];
        $payment->receiptno = $inputs['receiptno'];

        return $payment->save();
    }

    public function delete($id) {
        return $this->getById($id)->delete();
    }

    public function searching(Array $inputs, $id) {
        $this->term = $inputs['term'];
        $this->id = $id;
        return $this->payment->with('college')->where('col_id', '=', $id)
                        ->whereHas('student', function($q) {
                            $q->whereRaw('LOWER(`firstname`) like ?', '%' . $this->term . '%')->orWhereRaw('LOWER(`lastname`) like ?', '%' . $this->term . '%')
                            ->where('col_id', '=', $this->id);
                        })->get();
    }

}
