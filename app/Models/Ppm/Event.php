<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'ppm_events';

    protected $fillable = [
        'id_event',
        'name',
        'description',
        'start_date',
        'end_date'
    ];
}