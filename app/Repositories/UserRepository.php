<?php

namespace App\Repositories;

use App\User;
use App\Model\Pegawai;
use App\Model\Admin;

class UserRepository{
    protected $user;
    protected $pegawai;
    protected $admin;

    public function __construct(User $user, Pegawai $pegawai, Admin $admin){
        $this->user = $user;
        $this->pegawai = $pegawai;
        $this->admin = $admin;
    }

    public function getAllData(){
        return $this->user->with(['pegawai', 'admin'])->get();
    }

    public function getAllPegawai(){
        return $this->pegawai->with('user')->get();
    }

    public function getAllAdmin(){
        return $this->admin->with('user')->get();
    }

    public function store($data){
        return $this->user->create($data);
    }

    public function update($user, $data){
        return $user->update($data);
    }

    public function destroy($user){
        return $user->delete();
    }

}