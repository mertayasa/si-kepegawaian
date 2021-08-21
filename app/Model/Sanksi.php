<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    public $table = 'sanksi';

    protected $fillable = [
        'pegawai_nip',
        'golongan',
        'jabatan',
        'keterangan',
        'surat_sanksi'
    ];

    public function pegawai(){
        return $this->belongsTo('App\Model\Pegawai', 'pegawai_nip');
    }
}
