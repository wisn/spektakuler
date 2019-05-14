<?php

use Illuminate\Database\Seeder;
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
            'nip' => '123456-1',
            'username' => 'staff1',
            'password' => 'staff1',
            'nama' => 'Staff Satu',
        ]);

        Staff::firstOrCreate([
            'nip' => '123457-2',
            'username' => 'staff2',
            'password' => 'staff2',
            'nama' => 'Staff Dua',
        ]);
    }
}
