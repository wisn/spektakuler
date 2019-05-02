<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $table = 'asrama_gedung';

    protected $fillable = [
        'nama',
        'kategori',
        'kapasitas',
        'lokasi',
    ];
}
