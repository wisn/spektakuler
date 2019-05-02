<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'ppm_reviews';

    protected $fillable = [
        'id_evaluator',
        'id_paper',
        'review'
    ];
}