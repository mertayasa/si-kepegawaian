<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model{
    public $table = 'gaji';

    protected $fillable = [
        'golongan',
        'jabatan',
        'gaji'
    ];
}
