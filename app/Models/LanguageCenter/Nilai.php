<?php

namespace App\Models\LanguangeCenter;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'lac_nilai';

    protected $fillable = [
        'nama',
        'tipe_tes',
        'tipe_peserta',
        'ruangan',
        'nilai'
    ];

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
