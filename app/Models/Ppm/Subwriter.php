<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Subwriter extends Model
{
    protected $table = 'ppm_subwriters';

    protected $fillable = [
        'nim_mahasiswa',
        'id_paper',
    ];
}