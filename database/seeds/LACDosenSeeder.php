<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageCenter\Dosen;

class LACDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::firstOrCreate([
            'NIP' => '1000000001',
            'Nama' => 'Si Bapak A'
        ]);

        Dosen::firstOrCreate([
            'NIP' => '1000000002',
            'Nama' => 'Si Bapak B'
        ]);

        Dosen::firstOrCreate([
            'NIP' => '1000000003',
            'Nama' => 'Si Bapak C'
        ]);
    }
}
