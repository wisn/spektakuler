<?php

use Illuminate\Database\Seeder;
use App\Models\Ppm\Evaluator;

class PpmEvaluatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evaluator::create([
            'username' => 'asukarizki',
            'email' => 'rqrqrq@rocketmail.com',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'name' => 'Muhammad Alfarizky Sunetyo'
        ]);
        Evaluator::create([
            'username' => 'ansuci',
            'email' => 'bigsister@rocketmail.com',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'name' => 'Annisa Suciati Salsabila'
        ]);
        Evaluator::create([
            'username' => 'cokro',
            'email' => 'cokro@rocketmail.com',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'name' => 'Tjokroaminoto'
        ]);
    }
}
