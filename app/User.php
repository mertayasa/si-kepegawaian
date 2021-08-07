<?php

namespace App;

use App\Model\Admin;
use App\Model\Pegawai;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'email', 'password','level', 'username'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pegawai(){
        return $this->hasOne(Pegawai::class, 'user_id');
    }

    public function admin(){
        return $this->hasOne(Admin::class, 'user_id');
    }

    public function getFotoAttribute(){
        return userRole() == 'admin' ? $this->admin->foto ?? '' : $this->pegawai->foto;
    }

    public function getNoHpAttribute(){
        return userRole() == 'admin' ? $this->admin->no_hp ?? '-' : $this->pegawai->no_hp;
    }

    public function getAlamatAttribute(){
        return userRole() == 'admin' ? $this->admin->alamat ?? '-' : $this->pegawai->alamat;
    }

    public function getUserIdAttribute(){
        return $this->id;
    }

    public function getUmurAttribute(){
        return userRole() == 'admin' ? '' : $this->pegawai->umur;
    }

    public function getGolonganAttribute(){
        return userRole() == 'admin' ? '' : $this->pegawai->golongan;
    }

    public function getJumlahGajiAttribute(){
        return userRole() == 'admin' ? '' : formatPrice($this->pegawai->gaji->gaji);
    }

    // public function getJabatanAttribute(){
    //     return userRole() == 'admin' ? '' : getJabatan($this->pegawai->golongan);
    // }
}
