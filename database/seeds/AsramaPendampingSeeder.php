<?php

use Illuminate\Database\Seeder;
use App\Models\Asrama\Pendamping;

class AsramaPendampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendamping::firstOrCreate([
            'nim' => '1301160479',
            'id_kamar' => 2,
        ]);
    }
}
