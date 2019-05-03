<?php

use Illuminate\Database\Seeder;
use App\Models\Ppm\Subwriter;

class PpmSubwritersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subwriter::create([
            'nim_mahasiswa' => '1301160425',
            'id_paper' => 1
        ]);

        Subwriter::create([
            'nim_mahasiswa' => '1301164188',
            'id_paper' => 1
        ]);

        Subwriter::create([
            'nim_mahasiswa' => '1301160509',
            'id_paper' => 2
        ]);
    }
}
