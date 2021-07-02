<?php

namespace App\Repositories;

use App\Model\Gaji;

class GajiRepository{
    protected $gaji;

    public function __construct(Gaji $gaji){
        $this->gaji = $gaji;
    }

    public function getAllData(){
        return $this->gaji->get();
    }

    public function store($data){
        return $this->gaji->create($data);
    }

    public function update($gaji, $data){
        return $gaji->update($data);
    }

    public function destroy($gaji){
        return $gaji->delete();
    }
}