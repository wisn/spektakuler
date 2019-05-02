<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'asrama_gedung';

    protected $fillable = [
        'no_kamar',
        'id_gedung',
        'kapasitas',
    ];
}
