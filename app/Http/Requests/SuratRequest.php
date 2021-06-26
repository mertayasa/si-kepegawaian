<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'no_surat' => 'required','unique:surat,no_surat,'.$this->no_surat,
            'tgl_surat' => 'required|before_or_equal:now',
            'foto' => 'required',
        ];

        return $rules;
    }
}