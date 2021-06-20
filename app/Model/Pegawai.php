<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model{
    public $table = 'pegawai';

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_hp',
        'umur',
        'jk',
        'foto',
        'golongan'
    ];

    public $with = [
        'user'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getEmailAttribute(){
        return $this->user->email;
    }
}
