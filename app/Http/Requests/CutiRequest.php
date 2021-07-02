<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CutiRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'dari_tgl' => 'required|before_or_equal:now',
            'sampai_tgl' => 'required|after_or_equal:dari_tgl',
            'alasan' => 'required',
        ];

        return $rules;
    }
}
