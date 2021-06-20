<?php

namespace App\Repositories;

use App\Model\Surat;

class SuratRepository{
    protected $surat;

    public function __construct(Surat $surat){
        $this->surat = $surat;
    }

    public function getAllData(){
        return $this->surat->with('pegawai')->get();
    }

    public function store($data){
        return $this->surat->create($data);
    }

    public function update($surat, $data){
        return $surat->update($data);
    }

    public function destroy($surat){
        return $surat->delete();
    }

}