<?php

use Illuminate\Database\Seeder;
use App\Models\Ppm\Review;

class PpmReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::firstOrCreate([
            'id_evaluator' => 2,
            'id_paper' => 1,
            'review' => 'Sudah layak untuk disubmit.'
        ]);
    }
}
