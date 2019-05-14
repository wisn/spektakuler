<?php

use Illuminate\Database\Seeder;
use App\Models\Asrama\Penghuni;

class AsramaPenghuniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penghuni::firstOrCreate([
            'nim' => '1301160479',
            'id_kamar' => 1,
        ]);
    }
}
