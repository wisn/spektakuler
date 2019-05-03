<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Staff;

class HrStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
        	'nip_staff' => '98711678',
        	'jenis_staff' => 'Logistik',
        	'nama' => 'Ay Be De',
        	'alamat' => 'Jl. Telekomunikasi',
        	'ttl' => 'Bandung, 1 Mei 1990',
        	'nohp' => 123456669,
        	'gaji' => 900000,
        	'id_fakultas' => 'FIF',	
        ]);

    }
}
