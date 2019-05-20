<?php

use Illuminate\Database\Seeder;
use App\Models\StudentManagement\Mahasiswa;

class SmMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::firstOrCreate([
            'nim' => 1000000001,
            'nama' => 'Student Satu',
            'gender' => 'L',
            'angkatan' => 2016,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000002,
            'nama' => 'Student Dua',
            'gender' => 'P',
            'angkatan' => 2016,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000003,
            'nama' => 'Student Tiga',
            'gender' => 'L',
            'angkatan' => 2016,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000004,
            'nama' => 'Student Empat',
            'gender' => 'L',
            'angkatan' => 2016,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000005,
            'nama' => 'Student Lima',
            'gender' => 'P',
            'angkatan' => 2019,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000006,
            'nama' => 'Student Enam',
            'gender' => 'L',
            'angkatan' => 2019,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000007,
            'nama' => 'Student Tujuh',
            'gender' => 'L',
            'angkatan' => 2019,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000008,
            'nama' => 'Student Delapan',
            'gender' => 'P',
            'angkatan' => 2019,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => 1000000009,
            'nama' => 'Student Sembilan',
            'gender' => 'P',
            'angkatan' => 2017,
            'fakultas' => 'FIF',
            'program_studi' => 'S1 Informatika',
            'alamat' => '',
        ]);
    }
}
