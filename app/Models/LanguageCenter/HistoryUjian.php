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

    public function getAll() {
        return $this->all();
    }

    public function getHistory($id) {
        return $this->where('id', $id)->get();
    }

    public function getHistoryNIM($NIM) {
        return $this->where('NIM', $NIM)->get();
    }

    public function addHistory($object) {
        return $this->insert($object);
    }

    public function editHistory($id, $status_bayar, $status_setuju) {
        return $this->where('id', $id)
        ->update([
            'Status_Pembayaran' => $status_bayar,
            'Status_Persetujuan' => $status_setuju
            ]);
    }

    public function deleteHistory($id) {
        return $this->where('id', $id)->delete();
    }
}