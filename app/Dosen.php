<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'hr_dosen';

    protected $fillable = [
        'nip_dosen',
        'kodedosen',
        'nama',
        'alamat',
        'ttl',
        'nohp',
        'gaji',
        'id_fakultas',
    ];
}
