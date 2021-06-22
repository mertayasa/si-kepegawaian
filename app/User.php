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
}
