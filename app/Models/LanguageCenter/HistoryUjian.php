<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class HistoryUjian extends Model
{
    protected $table = 'lac_history_ujian';
    protected $fillable = [
        'NIM',
        'Nama',
        'Tgl_Test',
        'Tgl_Daftar',
        'Tipe_Test',
        'Tipe_Peserta',
        'Ruangan',
        'Status_Pembayaran',
        'Status_Persetujuan',
        'Jenis_History'
    ];
    public $timestamps = false;
}