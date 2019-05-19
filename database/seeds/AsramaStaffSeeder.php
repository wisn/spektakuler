<?php

use Illuminate\Database\Seeder;
use App\Models\Asrama\Staff;

class AsramaStaffSeeder extends Seeder
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
            'username' => 'staff1',
            'password' => 'staff1',
        ]);
    }
}
