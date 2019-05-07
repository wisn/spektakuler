<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'lac_nilai';

    protected $fillable = [
        'Tgl_Test',
        'Tipe_Test',
        'NIM',
        'Nama',
        'Tipe_Peserta',
        'Ruangan',
        'Nilai_Total',
        'Jenis_Nilai'
    ];

    public $timestamps = false;

    public function getAll() {
        return $this->all();
    }

    public function getNilai($id) {
        return $this->where('id', $id)->get();
    }

    public function getNilaiNIM($NIM) {
        return $this->where('NIM', $NIM)->get();
    }

    public function addNilai($tgl, $tipe, $nim, $nama, $tipe_peserta, $ruangan, $nilai_total, $jenis_nilai) {
        return $this->insert([
            'Tgl_Test' => $tgl,
            'Tipe_Test' => $tipe,
            'NIM' => $nim,
            'Nama' => $nama,
            'Tipe_Peserta' => $tipe_peserta,
            'Ruangan' => $ruangan,
            'Nilai_Total' => $nilai_total,
            'Jenis_Nilai' => $jenis_nilai
        ]);
    }

    public function editNilai($id, $nilai_total) {
        return $this->where('id', $id)->update(['Nilai_Total' => $nilai_total]);
    }

    public function deleteNilai($id) {
        return $this->where('id', $id)->delete();
    }
}
