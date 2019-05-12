<?php

namespace App\Model\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'hr_staff';

    protected $fillable = [
        'nip_staff',
        'jenis_staff',
        'nama',
        'alamat',
        'ttl',
        'nohp',
        'gaji',
        'id_fakultas',
    ];
}
