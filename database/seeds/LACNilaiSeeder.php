<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageCenter\Nilai;
use Carbon\Carbon;

class LACNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nilai::create([
            'Tgl_Test' => Carbon::parse('27-04-2018'),
            'Tipe_Test' => 'ECCT',
            'NIM' => '1301164203',
            'Nama' => 'Gagah Ghalistan',
            'Tipe_Peserta' => 'Mahasiswa',
            'Ruangan' => 'A101',
            'Nilai_Total' => 4,
            'Jenis_Nilai' => 'Internal' 
        ]);

        Nilai::create([
            'Tgl_Test' => Carbon::parse('02-03-2018'),
            'Tipe_Test' => 'EPrT',
            'NIM' => '1301164203',
            'Nama' => 'Gagah Ghalistan',
            'Tipe_Peserta' => 'Mahasiswa',
            'Ruangan' => 'A101',
            'Nilai_Total' => 503,
            'Jenis_Nilai' => 'Internal' 
        ]);
    }
}
