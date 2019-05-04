<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageCenter\ListUjian;

class LACListUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListUjian::create([
            'nama_ujian' => 'EPrT Preparation Course',
            'Tipe_Ujian' => 'Kursus',
            'Biaya_Ujian' => 200000
        ]);

        ListUjian::create([
            'nama_ujian' => 'ECCT Preparation Course',
            'Tipe_Ujian' => 'Kursus',
            'Biaya_Ujian' => 250000
        ]);

        ListUjian::create([
            'nama_ujian' => 'EPrT',
            'Tipe_Ujian' => 'Tes',
            'Biaya_Ujian' => 75000
        ]);

        ListUjian::create([
            'nama_ujian' => 'ECCT',
            'Tipe_Ujian' => 'Tes',
            'Biaya_Ujian' => 75000
        ]);
    }
}
