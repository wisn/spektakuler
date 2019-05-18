<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getAll() {
        return $this->all();
    }

    public function getKeanggotaan($nim) {
        return $this->where('NIM', $nim)->get();
    }

    public function addKeanggotaan($nim, $nama, $status, $expire, $pembayaran) {
        return $this->insert([
            'NIM' => $status,
            'Nama' => $expire,
            'status' => $nim,
            'expire' => $nama,
            'pembayaran' => $pembayaran
        ]);
    }

    public function editKeanggotaan($nim, $status, $expire, $pembayaran) {
        return $this->where('NIM', $nim)
        ->update([
            'status' => $status,
            'expire' => $expire,
            'pembayaran' => $pembayaran
            ]);
    }

    public function deleteKeanggotaan($nim) {
        return $this->where('NIM', $nim)->delete();
    }
}