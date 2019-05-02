<?php

use Illuminate\Database\Seeder;
use App\Models\Ppm\Paper;

class PpmPapersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paper::create([
            'title' => 'Mengurangi Efek Rumah Kaca dengan Machine Learning',
            'date' => '2019-03-12',
            'fund' => '10000000',
            'status' => 'approved',
            'id_event' => 1,
            'nip_dosen' => '100001',
            'id_staff' => 1
        ]);
        Paper::create([
            'title' => 'Analisis Sentimen Hasil Pemilu 2019 pada Media Sosial',
            'date' => '2020-04-20',
            'fund' => '8000000',
            'status' => 'verified',
            'id_event' => 2,
            'nip_dosen' => '100002',
            'id_staff' => 1
        ]);
    }
}
