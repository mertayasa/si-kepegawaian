<?php

namespace App\Repositories;

use App\Model\Sanksi;

class SanksiRepository{
    protected $sanksi;

    public function __construct(Sanksi $sanksi){
        $this->sanksi = $sanksi;
    }

    public function getAllData(){
        return $this->sanksi->with('pegawai')->get();
    }

    public function store($data){
        return $this->sanksi->create($data);
    }

    public function update($sanksi, $data){
        return $sanksi->update($data);
    }

    public function destroy($sanksi){
        return $sanksi->delete();
    }
}