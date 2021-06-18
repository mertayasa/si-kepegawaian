<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model{
    public $table = 'pegawai';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'umur',
        'jk',
        'foto',
        'golongan'
    ];
}
