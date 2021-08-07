<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CutiRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        $todayDate = date('m/d/Y');
        $rules = [
            'dari_tgl' => 'required|after_or_equal:'.$todayDate,
            'sampai_tgl' => 'required|after_or_equal:dari_tgl',
            'alasan' => 'required',
        ];

        return $rules;
    }
}
