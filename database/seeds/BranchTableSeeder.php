<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create(['name' => "Seni Baca Al Qur'an"]);
        Branch::create(['name' => "Qira'at Al Qur'an"]);
        Branch::create(['name' => "Hafalan Al Qur'an"]);
        Branch::create(['name' => "Tafsir Al Qur'an"]);
        Branch::create(['name' => "Fahm Al Qur'an"]);
        Branch::create(['name' => "Syarh Al Qur'an"]);
        Branch::create(['name' => "Seni Kaligrafi Al Qur'an"]);
        Branch::create(['name' => "Karya Tulis Ilmiah Al Qur'an"]);
    }
}
