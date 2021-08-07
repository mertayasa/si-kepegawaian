<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        $todayDate = date('m/d/Y');

        $rules = [
            'no_surat' => 'required','unique:surat,no_surat,'.$this->no_surat,
            'tgl_surat' => 'required|after_or_equal:'.$todayDate,
            'foto' => 'required',
        ];

        return $rules;
    }
}
