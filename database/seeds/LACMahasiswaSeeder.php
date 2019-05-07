<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageCenter\Mahasiswa;

class LACMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'NIM' => '1301164203',
            'Nama' => 'Gagah Ghalistan'
        ]);

        Mahasiswa::create([
            'NIM' => '1301164045',
            'Nama' => 'Aditya Eka Maulana'
        ]);

        Mahasiswa::create([
            'NIM' => '1301164351',
            'Nama' => 'Ryo Alif Ramadhan'
        ]);
    }
}
