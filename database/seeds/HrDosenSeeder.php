<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Dosen;

class HrDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::firstOrCreate([
        	'nip_dosen' => '12345678',
        	'kodedosen' => 'ABC',
        	'nama' => 'Ay Be Si',
        	'alamat' => 'Jl. Telekomunikasi',
        	'ttl' => 'Bandung, 1 Mei 1990',
        	'nohp' => 123456789,
        	'gaji' => 10000000,
        	'id_fakultas' => 'FIF',	
        ]);
        Dosen::firstOrCreate([
            'nip_dosen' => '1234538',
            'kodedosen' => 'ABD',
            'nama' => 'Ay Be Di',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
    }
}
