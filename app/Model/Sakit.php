<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sakit extends Model{
    public $table = 'sakit';

    protected $fillable = [
        'id_pegawai',
        'id_admin',
        'surat_ket',
        'tanggal',
        'alasan'
    ];

    public function pegawai(){
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }
}
