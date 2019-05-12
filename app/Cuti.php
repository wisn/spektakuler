<?php

namespace App\Model\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'hr_cuti';

    protected $fillable = [
        'id_cuti',
        'jeniscuti',
        'fk_nip_dosen',
        'rentangtanggal',
        'status',
        'nip_dosen',
        'nip_staff',        
    ];
}
