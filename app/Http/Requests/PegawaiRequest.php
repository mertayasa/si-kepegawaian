<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'umur' => 'required|numeric|min:17|max:65',
            'jk' => 'required',
            'golongan' => 'required|numeric|digits_between:1,4'
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['password' => 'required|string|min:8|confirmed'];
            $rules += ['foto' => 'required'];
        }else{
            $rules += ['email' => 'required|email|unique:users,email,'.$this->user_id];
            if($this->password != null){
                $rules += ['password' => 'required|string|min:8|confirmed'];
            }
        }

        return $rules;
    }
}
