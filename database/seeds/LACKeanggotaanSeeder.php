<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageCenter\Keanggotaan;
use Carbon\Carbon;

class LACKeanggotaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keanggotaan::create([
            'NIM' => '1301164045',
            'Nama' => 'Aditya Eka Maulana',
            'status' => 'Anggota',
            'expire' => Carbon::parse('12-12-2019'),
            'pembayaran' => 'lunas'
        ]);

        Keanggotaan::create([
            'NIM' => '1301164351',
            'Nama' => 'Ryo Alif Ramadhan',
            'status' => 'Expired',
            'expire' => Carbon::parse('01-03-2019'),
            'pembayaran' => 'Belum Lunas'
        ]);
    }
}
