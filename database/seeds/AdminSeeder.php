<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder{

    public function run(){
        $user = User::create([
            'nama' => 'admin',
            'username' => 'admin'.rand(1000, 9999),
            'email' => rand().'admin@demo.com',
            'password' => Hash::make('asdasdasd'),
            'level' => 0
        ]);

        $initial_admin = [
            'alamat' => 'alamat',
            'no_hp' => '0819341298',
        ];
        $user->admin()->create($initial_admin);
    }
}
