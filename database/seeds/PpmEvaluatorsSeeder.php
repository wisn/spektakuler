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
            'password' => md5('12345'),
            'name' => 'Muhammad Alfarizky Sunetyo'
        ]);

        Evaluator::create([
            'username' => 'ansuci',
            'email' => 'bigsister@rocketmail.com',
            'password' => md5('abcde'),
            'name' => 'Annisa Suciati Salsabila'
        ]);
    }
}
