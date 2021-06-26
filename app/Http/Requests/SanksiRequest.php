<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanksiRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'pegawai_id' => 'required|exists:pegawai,id',
            'keterangan' => 'required',
            'surat_sanksi' => 'required'
        ];

        return $rules;
    }
}
