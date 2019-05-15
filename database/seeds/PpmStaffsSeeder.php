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
        Staff::create([
            'username' => 'rizkiar00',
            'email' => 'rizkiganteng@rocketmail.com',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'name' => 'Rizki Achmad Riyanto'
        ]);
        Staff::create([
            'username' => 'zafitract',
            'email' => 'zafitract@rocketmail.com',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'name' => 'Rezza Nafi'
        ]);
        Staff::create([
            'username' => 'fargear24',
            'email' => 'fargear24@rocketmail.com',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'name' => 'Farras Hafis'
        ]);
    }
}
