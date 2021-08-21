<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        // dd($_REQUEST);
        $rules = [
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'umur' => 'required|numeric|min:17|max:65',
            'jk' => 'required',
            'id_gaji' => 'required'
        ];
        // 'golongan' => 'required|numeric|digits_between:1,4'
        
        if ($this->getMethod() == 'POST') {
            $rules += ['username' => 'required|string|unique:users'];
            $rules += ['nip' => 'required|string|unique:pegawai,nip'];
            $rules += ['password' => 'required|string|min:8|confirmed'];
            $rules += ['foto' => 'required'];
            $rules += ['email' => 'required|email|unique:users,email'];
        }else{
            $rules += ['nip' => 'required|string'];
            $rules += ['email' => 'required|email|unique:users,email,'.$this->user_id];
            $rules += ['username' => 'required|string|unique:users,username,'.$this->user_id];
            if($this->password != null){
                $rules += ['password' => 'required|string|min:8|confirmed'];
            }
        }

        return $rules;
    }
}
