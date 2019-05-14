<?php

use Illuminate\Database\Seeder;
use App\Models\Asrama\Kamar;

class AsramaKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kamar::firstOrCreate([
            'no_kamar' => 405,
            'nama_gedung' => '2',
            'kapasitas' => 4, // orang
            'tersisa' => 3,
        ]);

        Kamar::firstOrCreate([
            'no_kamar' => 101,
            'nama_gedung' => '2',
            'kapasitas' => 4,
            'tersisa' => 4,
        ]);
    }
}
