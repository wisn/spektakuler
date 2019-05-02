<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'ppm_papers';

    protected $fillable = [
        'id_paper',
        'title',
        'date',
        'fund',
        'status',
        'id_event',
        'nip_dosen',
        'id_staff'
    ];
}