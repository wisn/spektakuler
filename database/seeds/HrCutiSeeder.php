<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Cuti;

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
        	'jeniscuti' => 'hamil',
        	'rentangtanggal' =>'2019-06-13',
            'status' => 'not approved',
            'nip_dosen' => '12345678',
        ]);
        Cuti::create([
            'jeniscuti' => 'hamil',
            'rentangtanggal' =>'2019-06-13',
            'status' => 'not approved',
            'nip_staff' => '98711678',
        ]);
    }
}