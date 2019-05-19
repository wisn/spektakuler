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
        //$this->call('AsramaGedungSeeder');
        $this->call('PpmEventsSeeder');
        $this->call('PpmPapersSeeder');
        $this->call('PpmSubwritersSeeder');
        $this->call('PpmStaffsSeeder');
        $this->call('PpmEvaluatorsSeeder');
        $this->call('PpmReviewsSeeder');
        $this->call('LACMahasiswaSeeder');
        $this->call('LACDosenSeeder');
        $this->call('LACRuanganSeeder');
        $this->call('LACListUjianSeeder');
        $this->call('LACHistoryUjianSeeder');
        $this->call('LACKeanggotaanSeeder');
        $this->call('LACNilaiSeeder');
        $this->call('HrStaffSeeder');
        $this->call('AsramaStaffSeeder');
    }
}
