<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;
use App\Models\Asrama\Kamar;

class Penghuni extends Model
{
    protected $table = 'asrama_penghuni';

    protected $fillable = [
        'nim',
        'id_kamar',
    ];

    public function __constructor() {
        $this->kamar = new Kamar;
    }

    public function list()
    {
        return $this->all();
    }

    public function new($data) {
        $this->nim = $data['nim'];
        $this->id_kamar = $data['id_kamar'];

        $this->save();
    }

    public function remove($nim) {
        $isExists = $this->where('nim', $nim)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('nim', $nim)->delete();
        }

        return false;
    }

    public function assigned($nim) {
        $penghunian = $this->where('nim', $nim)->limit(1)->get();
        $isExists = count($penghunian) == 1;

        if ($isExists) {
          $id_kamar = $penghunian[0]['id_kamar'];
          $kamar = $this->kamar->detail($id_kamar);
          return [
            'nama_gedung' => $kamar['nama_gedung'],
            'nomor_kamar' => $kamar['nomor_kamar'],
          ];
        }

        return null;
    }
}
