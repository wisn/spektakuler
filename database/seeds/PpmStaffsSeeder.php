<?php

use Illuminate\Database\Seeder;
use App\Models\Ppm\Staff;

class PpmStaffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::firstOrCreate([
            'username' => 'rizkiar00',
            'email' => 'rizkiganteng@rocketmail.com',
            'password' => md5('rizkiganteng'),
            'name' => 'Rizki Achmad Riyanto'
        ]);
    }
}
