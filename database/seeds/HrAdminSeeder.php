<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Admin;

class HrAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'nip_admin' => '23456789',
        	'nama' => 'Ay De Si',
        	'alamat' => 'Jl. Telekomunikasi',
        	'ttl' => 'Bandung, 1 Mei 1990',
        	'nohp' => 123456789,
        	'gaji' => 10000000,
        	'id_fakultas' => 'FIF',	
        ]);
    }
}
