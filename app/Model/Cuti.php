<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model{
    
    public $table = 'cuti';

    protected $fillable = [
        'pegawai_nip',
        'dari_tgl',
        'sampai_tgl',
        'alasan',
        'status'
    ];

    public function getTotalHariAttribute(){
        // return 'asdas';
        $dari_tgl = Carbon::parse($this->attributes['dari_tgl']);
        $sampai_tgl = Carbon::parse($this->attributes['sampai_tgl']);

        $diff = $dari_tgl->diffInDays($sampai_tgl);

        return $diff;
    }

    public function pegawai(){
        return $this->belongsTo('App\Model\Pegawai', 'pegawai_nip');
    }
}
