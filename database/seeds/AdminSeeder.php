<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder{

    public function run(){
        $check_user = User::where('username', 'admin')->get();
        if($check_user->count() < 1){
            $user = User::create([
                'nama' => 'admin',
                'username' => 'admin',
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
}
