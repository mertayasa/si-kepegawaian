<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model{
    
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_hp',
        'foto'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
