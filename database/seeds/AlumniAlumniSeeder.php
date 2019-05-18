<?php

use Illuminate\Database\Seeder;
use App\Models\Alumni\Alumni;

class AlumniAlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Alumni::firstOrCreate([
            'NIM' => '1301164131',
            'tahun_kelulusan' => '2020',

        ]);

        Alumni::firstOrCreate([
            'NIM' => '130116400',
            'tahun_kelulusan' => '2020',

        ]);
    }
}
