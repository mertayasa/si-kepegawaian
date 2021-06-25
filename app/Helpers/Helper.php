<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

function uploadFile($base_64_foto){
    try{
        $foto = base64_decode($base_64_foto['data']);
        $folderName = 'images/';
        $safeName = time().$base_64_foto['name'];
        $destinationPath = public_path().'/' . $folderName;
        file_put_contents($destinationPath.$safeName, $foto);
    }catch(Exception $e){
        Log::info($e->getMessage());
        return 0;
    }

    return $safeName;
}

function editOrCreate(){
    if(Request::is('*tambah')){
        return 'tambah';
    };

    return 'edit';
}

function userRole(){
    $role_name = Auth::user()->level == 1 ? 'pegawai' : 'admin';

    return $role_name;
}

function getGender($gender_code){
    $gener = $gender_code == 'L' ? 'Laki-Laki' : 'Perempuan';

    return $gener;
}

function formatPrice($value){
    return 'Rp '. number_format($value,0,',','.');
}