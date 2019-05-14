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
        $this->call('HrStaffSeeder');
        $this->call('SmMahasiswaSeeder');
        $this->call('AsramaGedungSeeder');
        $this->call('AsramaKamarSeeder');
        $this->call('AsramaPenghuniSeeder');
    }
}
