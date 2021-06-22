<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model{
    
    public $table = 'cuti';

    protected $fillable = [
        'pegawai_id',
        'dari_tgl',
        'sampai_tgl',
        'alasan'
    ];

    public function pegawai(){
        return $this->belongsTo('App\Model\Pegawai', 'pegawai_id');
    }
}
