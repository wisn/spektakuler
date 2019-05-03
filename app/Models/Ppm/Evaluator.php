<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    protected $table = 'ppm_evaluators';

    protected $fillable = [
        'id_evaluator',
        'username',
        'email',
        'password',
        'name',
    ];
}