<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Fakultas;

class HrFakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultas::firstOrCreate([
        	'id_fakultas' => 'FIF', 
        	'nama_fakultas'=>'Fakultas Informatika',	
        ]);
    
    }
}
