<?php

use App\Model\Gaji;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    public function run(){
        $gaji = [
            [
                'golongan' => 'Golongan IV',
                'gaji' => 5500000,
                'jabatan' => 'Sekre'
            ],
            [
                'golongan' => 'Golongan III',
                'gaji' => 4500000,
                'jabatan' => 'KaBag'
            ],
            [
                'golongan' => 'Golongan II',
                'gaji' => 3500000,
                'jabatan' => 'KaSuBag'
            ],
            [
                'golongan' => 'Golongan I',
                'gaji' => 2500000,
                'jabatan' => 'Bag'
            ],
        ];

        foreach($gaji as $g){
            Gaji::create($g);
        }
    }
}
