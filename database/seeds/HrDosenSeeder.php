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
        Dosen::create([
        	'nip_dosen' => '12345678',
        	'kodedosen' => 'ANR',
        	'nama' => 'Anastasia Rahimah',
        	'alamat' => 'Jl. Telekomunikasi',
        	'ttl' => 'Bandung, 1 Mei 1990',
        	'nohp' => 123456789,
        	'gaji' => 10000000,
        	'id_fakultas' => 'FIF',	
        ]);
        Dosen::create([
            'nip_dosen' => '12345679',
            'kodedosen' => 'ULW',
            'nama' => 'Ulya Laksmiwati',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345680',
            'kodedosen' => 'GPA',
            'nama' => 'Gabriella Pudjiastuti',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345681',
            'kodedosen' => 'JUT',
            'nama' => 'Jaswadi Utama',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345682',
            'kodedosen' => 'AJL',
            'nama' => 'Almira Jailani',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345683',
            'kodedosen' => 'RTH',
            'nama' => 'Rudi Tarihoran',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345684',
            'kodedosen' => 'CPS',
            'nama' => 'Cawuk Padmasari',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345685',
            'kodedosen' => 'ABC',
            'nama' => 'Ikin Wastuti',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345686',
            'kodedosen' => 'ABC',
            'nama' => 'Elma Riyanti',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);
        Dosen::create([
            'nip_dosen' => '12345687',
            'kodedosen' => 'ABC',
            'nama' => 'Elvin Kusmawati',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456789,
            'gaji' => 10000000,
            'id_fakultas' => 'FIF', 
        ]);                                                           
    }
}
