<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SakitRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'surat_ket' => 'required',
            'tanggal' => 'required|before_or_equal:now',
            'alasan' => 'required'
        ];
        
        return $rules;
    }
}
