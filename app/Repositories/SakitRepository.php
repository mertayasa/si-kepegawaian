<?php

namespace App\Repositories;

use App\Model\Sakit;

class SakitRepository{
    protected $sakit;

    public function __construct(Sakit $sakit){
        $this->sakit = $sakit;
    }

    public function getAllData(){
        return $this->sakit->with('pegawai')->get();
    }

    public function store($data){
        return $this->sakit->create($data);
    }

    public function update($sakit, $data){
        return $sakit->update($data);
    }

    public function destroy($sakit){
        return $sakit->delete();
    }
}