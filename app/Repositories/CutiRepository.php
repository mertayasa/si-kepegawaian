<?php

namespace App\Repositories;

use App\Model\Cuti;

class CutiRepository{
    protected $cuti;

    public function __construct(Cuti $cuti){
        $this->cuti = $cuti;
    }

    public function getAllData(){
        return $this->cuti->with('pegawai')->get();
    }

    public function store($data){
        return $this->cuti->create($data);
    }

    public function update($cuti, $data){
        return $cuti->update($data);
    }

    public function destroy($cuti){
        return $cuti->delete();
    }
}