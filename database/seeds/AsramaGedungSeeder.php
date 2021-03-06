<?php

use Illuminate\Database\Seeder;
use App\Models\Asrama\Gedung;

class AsramaGedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gedung::firstOrCreate([
            'nama' => 'A',
            'kategori' => 'putri',
            'kapasitas' => 40, // kamar
            'tersisa' => 40,
        ]);

        Gedung::firstOrCreate([
            'nama' => '1',
            'kategori' => 'putra',
            'kapasitas' => 40,
            'tersisa' => 40,
        ]);
    }
}
