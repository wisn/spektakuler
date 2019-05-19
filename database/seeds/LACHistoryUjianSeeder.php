<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageCenter\HistoryUjian;
use Carbon\Carbon;

class LACHistoryUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HistoryUjian::firstOrCreate([
            'NIM' => '1301164203',
            'Nama' => 'Gagah Ghalistan',
            'Tgl_Test' => Carbon::parse('27-04-2018'),
            'Tgl_Daftar' => Carbon::parse('25-04-2018'),
            'Tipe_Test' => 'ECCT',
            'Tipe_Peserta' => 'Mahasiswa',
            'Ruangan' => 'A101',
            'Status_Pembayaran' => true,
            'Status_Persetujuan' => true,
            'Jenis_History' => 'test'
        ]);

        HistoryUjian::firstOrCreate([
            'NIM' => '1301164203',
            'Nama' => 'Gagah Ghalistan',
            'Tgl_Test' => Carbon::parse('02-03-2018'),
            'Tgl_Daftar' => Carbon::parse('28-02-2018'),
            'Tipe_Test' => 'EPrT',
            'Tipe_Peserta' => 'Mahasiswa',
            'Ruangan' => 'A102',
            'Status_Pembayaran' => true,
            'Status_Persetujuan' => true,
            'Jenis_History' => 'test'
        ]);

        HistoryUjian::firstOrCreate([
            'NIM' => '1301164351',
            'Nama' => 'Ryo Alif Ramadhan',
            'Tgl_Test' => Carbon::parse('02-03-2018'),
            'Tgl_Daftar' => Carbon::parse('28-02-2018'),
            'Tipe_Test' => 'EPrT Preparation Course',
            'Tipe_Peserta' => 'Mahasiswa',
            'Ruangan' => 'A102',
            'Status_Pembayaran' => true,
            'Status_Persetujuan' => true,
            'Jenis_History' => 'kursus'
        ]);

        HistoryUjian::firstOrCreate([
            'NIM' => '1301164351',
            'Nama' => 'Aditya Eka Maulana',
            'Tgl_Test' => Carbon::parse('02-03-2018'),
            'Tgl_Daftar' => Carbon::parse('28-02-2018'),
            'Tipe_Test' => 'ECCT Preparation Course',
            'Tipe_Peserta' => 'Mahasiswa',
            'Ruangan' => 'A102',
            'Status_Pembayaran' => true,
            'Status_Persetujuan' => true,
            'Jenis_History' => 'kursus'
        ]);
    }
}
