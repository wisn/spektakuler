<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Cuti;

class HrCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuti::create([
        	'id_cuti' => '123',
        	'jeniscuti' => 'hamil',
        	'rentangtanggal' =>'2019-05-03', 
        ]);

    }
}