<?php

use App\Model\Gaji;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    public function run(){
        $gaji = [
            [
                'golongan' => 'Golongan IA',
                'gaji' => 2300000,
            ],
            [
                'golongan' => 'Golongan IB',
                'gaji' => 2400000,
            ],
            [
                'golongan' => 'Golongan IC',
                'gaji' => 2500000,
            ],
            [
                'golongan' => 'Golongan ID',
                'gaji' => 2600000,
            ],

            [
                'golongan' => 'Golongan IIA',
                'gaji' => 3300000,
            ],
            [
                'golongan' => 'Golongan IIB',
                'gaji' => 3400000,
            ],
            [
                'golongan' => 'Golongan IIC',
                'gaji' => 3500000,
            ],
            [
                'golongan' => 'Golongan IID',
                'gaji' => 3600000,
            ],


            [
                'golongan' => 'Golongan IIIA',
                'gaji' => 4200000,
            ],
            [
                'golongan' => 'Golongan IIIB',
                'gaji' => 4300000,
            ],
            [
                'golongan' => 'Golongan IIIC',
                'gaji' => 4400000,
            ],
            [
                'golongan' => 'Golongan IIID',
                'gaji' => 4500000,
            ],


            [
                'golongan' => 'Golongan IVA',
                'gaji' => 5000000,
            ],
            [
                'golongan' => 'Golongan IVB',
                'gaji' => 5200000,
            ],
            [
                'golongan' => 'Golongan IVC',
                'gaji' => 5400000,
            ],
            [
                'golongan' => 'Golongan IVD',
                'gaji' => 5600000,
            ],
        ];

        foreach($gaji as $g){
            Gaji::create($g);
        }
    }
}
