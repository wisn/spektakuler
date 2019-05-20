<?php

use Illuminate\Database\Seeder;
use App\Models\Asrama\SeniorResidence;

class AsramaSrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeniorResidence::firstOrCreate([
            'nim' => 1000000001,
            'username' => 'student1',
            'password' => 'student1',
            'id_gedung' => 0,
        ]);

        SeniorResidence::firstOrCreate([
            'nim' => 1000000002,
            'username' => 'student2',
            'password' => 'student2',
            'id_gedung' => 0,
        ]);

        SeniorResidence::firstOrCreate([
            'nim' => 1000000003,
            'username' => 'student3',
            'password' => 'student3',
            'id_gedung' => 0,
        ]);

        SeniorResidence::firstOrCreate([
            'nim' => 1000000004,
            'username' => 'student4',
            'password' => 'student4',
            'id_gedung' => 0,
        ]);
    }
}
