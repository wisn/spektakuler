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
            'keterangan' => 'ngetest',
            'nip' => '12345678',
            'id_fakultas' => 'FIF',
        ]);
        Cuti::create([
            'jeniscuti' => 'hamil',
            'rentangtanggal' =>'2019-06-13',
            'status' => 'not approved',
            'keterangan' => 'ngetest',
            'nip' => '98711678',
            'id_fakultas' => 'FIF',
        ]);
    }
}