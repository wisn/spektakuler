<?php

namespace App\Model\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'hr_sertifikat';

    protected $fillable = [
        'id_sertifikat',
        'jenissertifikat',
    ];
}
