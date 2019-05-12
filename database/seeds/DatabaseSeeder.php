<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('HrDosenSeeder');
        $this->call('HrFakultasSeeder');
        $this->call('HrStaffSeeder');
        $this->call('HrAdminSeeder');
        $this->call('HrCutiSeeder');
    }
}
