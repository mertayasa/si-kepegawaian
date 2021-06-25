<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'user_id' => 'required',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'foto' => 'required'
        ];

        if($this->password != null){
            $rules += ['password' => 'required|string|min:8|confirmed'];
        }

        if (userRole() == 'pegawai') {
            $rules += ['umur' => 'required|numeric|min:17|max:65'];
            $rules += ['jk' => 'required'];
        }

        return $rules;
    }
}
