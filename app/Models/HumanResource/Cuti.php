<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'hr_cuti';

    protected $fillable = [
        'id_cuti',
        'jeniscuti',
        'rentangtanggal',
        'status',
        'nip_dosen',
        'nip_staff',
    ];
    public function listCuti()
    {
        return $this->all();
    }
}
