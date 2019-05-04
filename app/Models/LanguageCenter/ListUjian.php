<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class ListUjian extends Model
{
    protected $table = 'lac_list_ujian';
    protected $fillable = [
        'nama_ujian',
        'Tipe_Ujian',
        'Biaya_Ujian'
    ];
    public $timestamps = false;
}