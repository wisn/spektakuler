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

    public function listNilai()
    {
      return $this->all();
    }

    public function new($data) {
        $this->nama = $data['nama'];
        $this->tipe_tes = $data['tipe_tes'];
        $this->tipe_peserta = $data['tipe_peserta'];
        $this->ruangan = $data['ruangan'];
        $this->nilai = $data['nilai'];

        $this->save();
    }
}
