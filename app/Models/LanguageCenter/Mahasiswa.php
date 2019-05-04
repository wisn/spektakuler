<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'lac_mahasiswa';
    protected $primaryKey = 'NIM';
    protected $fillable = [
        'NIM',
        'Nama'
    ];
}