<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Guest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 2,
            'first_name' =>  'Гость',
            'last_name' =>  'Гость',
            'tel_number' =>  000,
            'email' => 'guest@gmail.com',
            'email_verified_at' => now(),
            'password' => 'null',
            'remember_token' => Str::random(10),
            'is_admin' => 0
        ]);
    }
}
