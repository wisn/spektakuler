<?php

use Illuminate\Database\Seeder;
use App\Models\Ppm\Event;

class PpmEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::firstOrCreate([
            'name' => 'PKM 2019',
            'description' => 'Pekan Kreativitas Mahasiswa (PKM) tahun 2019',
            'start_date' => '2019-01-01',
            'end_date' => '2019-12-31'
        ]);
        Event::firstOrCreate([
            'name' => 'PKM 2020',
            'description' => 'Pekan Kreativitas Mahasiswa (PKM) tahun 2020',
            'start_date' => '2020-01-01',
            'end_date' => '2020-12-31'
        ]);
    }
}
