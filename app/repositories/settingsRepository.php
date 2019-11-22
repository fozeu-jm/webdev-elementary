<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\settings;

/**
 * Description of settingsRepository
 *
 * @author pawn
 */
class settingsRepository {

    protected $setting;

    public function __construct(settings $setting) {
        $this->setting = $setting;
    }

    public function getById($id) {
        $setting = $this->setting->where('col_id', '=', $id)->first();
        return $setting;
    }

    public function getByPrimary($id) {
        return $this->setting->findOrFail($id);
    }

    public function update(array $inputs, $id, $picture = null) {
        $setting = $this->getByPrimary($id);

        $setting->name_en = $inputs['name_en'];

        $setting->motto = $inputs['motto'];
        $setting->motto_en = $inputs['motto_en'];
        $setting->sign_title = $inputs['sign_title'];
        $setting->sign_name = $inputs['sign_name'];
        $setting->intern_percent = $inputs['intern_percent'];
        
        if (!is_null($picture)) {
            $setting->logo = $picture;
        }

        return $setting->save();
    }

}
