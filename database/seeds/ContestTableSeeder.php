<?php

use Illuminate\Database\Seeder;
use App\Branch;
use App\Contest;

class ContestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cabang Seni Baca Al Qur'an
        Contest::create(['name' => "Tartil Al Qur'an putera Umur Maksimal 12 tahun 11 bulan 29 hari", 'age_limit' => "12 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tartil Al Qur'an puteri Umur Maksimal 12 tahun 11 bulan 29 hari", 'age_limit' => "12 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Anak - anak putera Umur Maksimal 14 tahun 11 bulan 29 hari", 'age_limit' => "14 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Anak - anak puteri Umur Maksimal 14 tahun 11 bulan 29 hari", 'age_limit' => "14 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Remaja putera Umur Maksimal 24 tahun 11 bulan 29 hari", 'age_limit' => "24 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Remaja puteri Umur Maksimal 24 tahun 11 bulan 29 hari", 'age_limit' => "24 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Cacat Netra putera Umur Maksimal 49 tahun 11 bulan 29 hari", 'age_limit' => "49 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Cacat Netra puteri Umur Maksimal 49 tahun 11 bulan 29 hari", 'age_limit' => "49 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Dewasa putera Umur Maksimal 40 tahun 11 bulan 29 hari", 'age_limit' => "49 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);
        Contest::create(['name' => "Tilawah Dewasa puteri Umur Maksimal 40 tahun 11 bulan 29 hari", 'age_limit' => "49 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Baca Al Qur'an")->first()->id]);

        // Cabang Qira'at Al Qur'an
        Contest::create(['name' => "Qira'at Al Qur'an Mujawwad Dewasa putera Umur Maksimal 40 tahun 11 bulan 29 hari", 'age_limit' => "40 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Qira'at Al Qur'an")->first()->id]);
        Contest::create(['name' => "Qira'at Al Qur'an Mujawwad Dewasa puteri Umur Maksimal 40 tahun 11 bulan 29 hari", 'age_limit' => "40 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Qira'at Al Qur'an")->first()->id]);
        Contest::create(['name' => "Qira'at Al Qur'an Murattal Dewasa putera Umur Maksimal 40 tahun 11 bulan 29 hari", 'age_limit' => "40 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Qira'at Al Qur'an")->first()->id]);
        Contest::create(['name' => "Qira'at Al Qur'an Murattal Dewasa puteri Umur Maksimal 40 tahun 11 bulan 29 hari", 'age_limit' => "40 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Qira'at Al Qur'an")->first()->id]);
        Contest::create(['name' => "Qira'at Al Qur'an Murattal Remaja putera Umur Maksimal 24 tahun 11 bulan 29 hari", 'age_limit' => "24 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Qira'at Al Qur'an")->first()->id]);
        Contest::create(['name' => "Qira'at Al Qur'an Murattal Remaja puteri Umur Maksimal 24 tahun 11 bulan 29 hari", 'age_limit' => "24 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Qira'at Al Qur'an")->first()->id]);

        // Cabang Hafalan Al Qur'an
        Contest::create(['name' => "1 Juz dan Tilawah putera Umur Maksimal 15 tahun 11 bulan 29 hari", 'age_limit' => "15 tahun 11 bulan 29
         hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);
        Contest::create(['name' => "1 Juz dan Tilawah puteri Umur Maksimal 15 tahun 11 bulan 29 hari", 'age_limit' => "15 tahun 11 bulan 29
         hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);

        Contest::create(['name' => "5 Juz dan Tilawah putera Umur Maksimal 20 tahun 11 bulan 29 hari", 'age_limit' => "20 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);
        Contest::create(['name' => "5 Juz dan Tilawah puteri Umur Maksimal 20 tahun 11 bulan 29 hari", 'age_limit' => "20 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);

        Contest::create(['name' => "10 Juz putera Umur Maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);
        Contest::create(['name' => "10 Juz puteri Umur Maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);

        Contest::create(['name' => "20 Juz putera Umur Maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);
        Contest::create(['name' => "20 Juz puteri Umur Maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);

        Contest::create(['name' => "30 Juz putera Umur Maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);
        Contest::create(['name' => "30 Juz puteri Umur Maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Hafalan Al Qur'an")->first()->id]);

        // Cabang Tafsir Al Qur'an
        Contest::create(['name' => "Bahasa Arab putera, yaitu hafalan 30 Juz dan Tafsir Juz X. Umur maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Tafsir Al Qur'an")->first()->id]);
        Contest::create(['name' => "Bahasa Arab puteri, yaitu hafalan 30 Juz dan Tafsir Juz X. Umur maksimal 22 tahun 11 bulan 29 hari", 'age_limit' => "22 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Tafsir Al Qur'an")->first()->id]);

        Contest::create(['name' => "Bahasa Indonesia putera, yaitu hafalan 30 Juz dan Tafsir Juz XII. Umur maksimal 34 tahun 11 bulan 29 hari", 'age_limit' => "34 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Tafsir Al Qur'an")->first()->id]);
        Contest::create(['name' => "Bahasa Indonesia puteri, yaitu hafalan 30 Juz dan Tafsir Juz XII. Umur maksimal 34 tahun 11 bulan 29 hari", 'age_limit' => "34 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Tafsir Al Qur'an")->first()->id]);

        Contest::create(['name' => "Bahasa Inggris putera, yaitu hafalan 14 Juz pertama (Juz I s/d Juz XIV) dan Tafsir Juz X. Umur maksimal 34 tahun 11 bulan 29 hari", 'age_limit' => "34 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Tafsir Al Qur'an")->first()->id]);
        Contest::create(['name' => "Bahasa Inggris puteri, yaitu hafalan 14 Juz pertama (Juz I s/d Juz XIV) dan Tafsir Juz X. Umur maksimal 34 tahun 11 bulan 29 hari", 'age_limit' => "34 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Tafsir Al Qur'an")->first()->id]);

        // Cabang Fahm Al Qur'an
        Contest::create(['name' => "Cabang Fahm Al Qur'an Umur maksimal 18 tahun 11 bulan 29 hari", 'age_limit' => "18 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Fahm Al Qur'an")->first()->id]);
        Contest::create(['name' => "Cabang Fahm Al Qur'an Umur maksimal 18 tahun 11 bulan 29 hari", 'age_limit' => "18 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Fahm Al Qur'an")->first()->id]);

        // Cabang Syarh Al Qur'an
        Contest::create(['name' => "Cabang Syarh Al Qur'an Umur maksimal 18 tahun 11 bulan 29 hari", 'age_limit' => "18 tahun 11 bulan 29
          hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Syarh Al Qur'an")->first()->id]);
        Contest::create(['name' => "Cabang Syarh Al Qur'an Umur maksimal 18 tahun 11 bulan 29 hari", 'age_limit' => "18 tahun 11 bulan 29
          hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Syarh Al Qur'an")->first()->id]);

        // Cabang Seni Kaligrafi Al Qur'an
        Contest::create(['name' => "Golongan Naskah (Penulisan buku) putera", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);
        Contest::create(['name' => "Golongan Naskah (Penulisan buku) puteri", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);

        Contest::create(['name' => "Hiasan Mushaf putera", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);
        Contest::create(['name' => "Hiasan Mushaf puteri", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);

        Contest::create(['name' => "Dekorasi putera", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);
        Contest::create(['name' => "Dekorasi puteri", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);

        Contest::create(['name' => "Kontemporer putera", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);
        Contest::create(['name' => "Kontemporer puteri", 'age_limit' => "34 tahun 11 bulan 29
        hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Seni Kaligrafi Al Qur'an")->first()->id]);

        // Cabang Karya Tulis Ilmiah Al Qur'an (KTIQ)
        Contest::create(['name' => "Cabang Karya Tulis Ilmiah Al Qur'an (KTIQ) putera", 'age_limit' => "24 tahun 11 bulan 29
        hari", 'types' => 'putera', 'branch_id' => Branch::where('name', "Karya Tulis Ilmiah Al Qur'an")->first()->id]);
        Contest::create(['name' => "Cabang Karya Tulis Ilmiah Al Qur'an (KTIQ) puteri", 'age_limit' => "24 tahun 11 bulan 29
        hari", 'types' => 'puteri', 'branch_id' => Branch::where('name', "Karya Tulis Ilmiah Al Qur'an")->first()->id]);
    }
}
