<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageCenter\Ruangan;

class LACRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ruangan::firstOrCreate([
            'Kode_Ruangan' => 'A101',
            'Kapasitas' => 20
        ]);

        Ruangan::firstOrCreate([
            'Kode_Ruangan' => 'A102',
            'Kapasitas' => 20
        ]);

        Ruangan::firstOrCreate([
            'Kode_Ruangan' => 'A103',
            'Kapasitas' => 20
        ]);

        Ruangan::firstOrCreate([
            'Kode_Ruangan' => 'A104',
            'Kapasitas' => 30
        ]);
    }
}
