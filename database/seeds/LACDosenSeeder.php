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
        Dosen::create([
            'NIP' => '0000000001',
            'Nama' => 'Si Bapak A'
        ]);

        Dosen::create([
            'NIP' => '0000000002',
            'Nama' => 'Si Bapak B'
        ]);

        Dosen::create([
            'NIP' => '0000000003',
            'Nama' => 'Si Bapak C'
        ]);
    }
}
