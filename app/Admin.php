<?php

namespace App\Model\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'hr_admin';

    protected $fillable = [
        'nip_admin',
        'nama',
        'alamat',
        'ttl',
        'nohp',
        'gaji',
        'id_fakultas',
    ];
}
