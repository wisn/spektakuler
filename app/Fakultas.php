<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'hr_fakultas';

    protected $fillable = [
        'id_fakultas',
        'nama_fakultas',
    ];
}
