<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'ppm_staffs';

    protected $fillable = [
        'id_staff',
        'username',
        'email',
        'password',
        'name',
    ];
}