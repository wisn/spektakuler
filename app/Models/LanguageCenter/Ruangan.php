<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'lac_ruangan';
    protected $primaryKey = 'Kode_Ruangan';
    protected $fillable = [
        'Kode_Ruangan',
        'Kapasitas'
    ];
    public $timestamps = false;
}