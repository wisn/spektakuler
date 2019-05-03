<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Sertifikat;

class HrSertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sertifikat::create([
        	'id_sertifikat' => '123',
        	'jenissertifikat' => 'pendidikan',
        ]);

    }
}