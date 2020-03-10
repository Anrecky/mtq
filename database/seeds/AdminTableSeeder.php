<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'administratorkesra@bangka.go.id',
            'username' => 'administrator20kesra',
            'password' => Hash::make('adminkesra2020*%'),
            'avatar' => 'default-peserta.png',
            'birthdate' => now(),
            'is_admin' => 1,
            'gender' => 'putera',
        ]);
    }
}
