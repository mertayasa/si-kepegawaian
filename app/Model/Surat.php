<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model{

    public $table = 'surat';

    protected $fillable = [
        // 'pegawai_id',
        'no_surat',
        'tgl_surat',
        'foto'
    ];

    // public function pegawai(){
    //     return $this->belongsTo(Pegawai::class, 'pegawai_id');
    // }
}
