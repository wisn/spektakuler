<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Staff;
class HrStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::firstOrCreate([
        	'nip_staff' => '98711678',
        	'jenis_staff' => 'Logistik',
        	'nama' => 'Irwan Nasyidah',
        	'alamat' => 'Jl. Telekomunikasi',
        	'ttl' => 'Bandung, 1 Mei 1990',
        	'nohp' => 123456669,
        	'gaji' => 900000,
        	'id_fakultas' => 'FIF',	
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711679',
            'jenis_staff' => 'Logistik',
            'nama' => 'Teddy Rahimah',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711680',
            'jenis_staff' => 'Logistik',
            'nama' => 'Bahuwarna Uyainah ',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711681',
            'jenis_staff' => 'Logistik',
            'nama' => 'Silvia Laksita',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711682',
            'jenis_staff' => 'Logistik',
            'nama' => 'Mulyono Hasanah',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711683',
            'jenis_staff' => 'Logistik',
            'nama' => 'Hamima Nababan',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711684',
            'jenis_staff' => 'Logistik',
            'nama' => 'Hamima Wibowo',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711685',
            'jenis_staff' => 'Logistik',
            'nama' => 'Citra Saptono',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711686',
            'jenis_staff' => 'Logistik',
            'nama' => 'Ayu Ramadan',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
        Staff::firstOrCreate([
            'nip_staff' => '98711687',
            'jenis_staff' => 'Logistik',
            'nama' => 'Paris Pertiwi',
            'alamat' => 'Jl. Telekomunikasi',
            'ttl' => 'Bandung, 1 Mei 1990',
            'nohp' => 123456669,
            'gaji' => 900000,
            'id_fakultas' => 'FIF', 
        ]);
    }
}
