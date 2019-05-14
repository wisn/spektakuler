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
            'nim' => '1301160479',
            'username' => 'wisn',
            'password' => 'wisn',
            'nama' => 'Wisnu Adi Nurcahyo',
            'fakultas' => 'FIF',
            'prodi' => 'S1 Informatika',
            'angkatan' => 2016,
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => '100000001',
            'username' => 'student1',
            'password' => 'student1',
            'nama' => 'Student Satu',
            'fakultas' => 'FIF',
            'prodi' => 'S1 Informatika',
            'angkatan' => 2019,
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => '100000002',
            'username' => 'student2',
            'password' => 'student2',
            'nama' => 'Student Dua',
            'fakultas' => 'FIF',
            'prodi' => 'S1 Informatika',
            'angkatan' => 2019,
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => '100000003',
            'username' => 'student3',
            'password' => 'student3',
            'nama' => 'Student Tiga',
            'fakultas' => 'FIF',
            'prodi' => 'S1 Informatika',
            'angkatan' => 2019,
        ]);

        Mahasiswa::firstOrCreate([
            'nim' => '100000004',
            'username' => 'student4',
            'password' => 'student4',
            'nama' => 'Student Empat',
            'fakultas' => 'FIF',
            'prodi' => 'S1 Informatika',
            'angkatan' => 2019,
        ]);
    }
}
