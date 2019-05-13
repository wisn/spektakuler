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
            'password' => password_hash('rizkiganteng', PASSWORD_DEFAULT),
            'name' => 'Rizki Achmad Riyanto'
        ]);
    }
}
