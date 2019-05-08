<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'hr_cuti';

    protected $fillable = [
        'id_cuti',
        'jeniscuti',
        'rentangtanggal',
    ];
}
