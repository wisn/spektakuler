<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'lac_dosen';
    protected $primaryKey = 'NIP';
    protected $fillable = [
        'NIP',
        'Nama'
    ];
    public $timestamps = false;
}