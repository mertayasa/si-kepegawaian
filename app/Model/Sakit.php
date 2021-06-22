<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sakit extends Model{
    public $table = 'sakit';

    protected $fillable = [
        'pegawai_id',
        'surat_ket',
        'tanggal',
        'alasan'
    ];

    public function pegawai(){
        return $this->belongsTo('App\Model\Pegawai', 'pegawai_id');
    }
}
