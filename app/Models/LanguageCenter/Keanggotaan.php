<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    protected $table = 'lac_keanggotaan';
    protected $fillable = [
        'NIM',
        'Nama',
        'status',
        'expire',
        'pembayaran'
    ];
    public $timestamps = false;
}