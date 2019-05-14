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
    }
}
