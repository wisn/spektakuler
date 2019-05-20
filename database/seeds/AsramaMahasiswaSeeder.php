<?php

use Illuminate\Database\Seeder;
use App\Models\Asrama\Mahasiswa;

class AsramaMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 1,
            'username' => 'student1',
            'password' => 'student1',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 2,
            'username' => 'student2',
            'password' => 'student2',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 3,
            'username' => 'student3',
            'password' => 'student3',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 4,
            'username' => 'student4',
            'password' => 'student4',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 5,
            'username' => 'student5',
            'password' => 'student5',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 6,
            'username' => 'student6',
            'password' => 'student6',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 7,
            'username' => 'student7',
            'password' => 'student7',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 8,
            'username' => 'student8',
            'password' => 'student8',
        ]);

        Mahasiswa::firstOrCreate([
            'id_mahasiswa' => 9,
            'username' => 'student9',
            'password' => 'student9',
        ]);

        
    }
}
