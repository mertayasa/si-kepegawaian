<?php

use App\Model\Gaji;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    public function run(){
        $gaji = [
            [
                'golongan' => 'Golongan 1',
                'gaji' => rand(1000000, 3000000),
                'jabatan' => 'Jabatan 1'
            ],
            [
                'golongan' => 'Golongan 1',
                'gaji' => rand(1000000, 3000000),
                'jabatan' => 'Jabatan 2'
            ],
            [
                'golongan' => 'Golongan 2',
                'gaji' => rand(1000000, 3000000),
                'jabatan' => 'Jabatan 1'
            ],
            [
                'golongan' => 'Golongan 1',
                'gaji' => rand(1000000, 3000000),
                'jabatan' => 'Jabatan 2'
            ],
        ];

        foreach($gaji as $g){
            Gaji::create($g);
        }
    }
}
