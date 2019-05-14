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
          $kamar = (new Kamar)->findByIdKamar($id_kamar);
          $penghuni = $this->findByIdKamar($id_kamar);
          return [
            'kamar' => $kamar,
            'penghuni' => $penghuni,
          ];
        }

        return null;
    }

    public function findByIdKamar($id_kamar) {
        return $this->where('id_kamar', $id_kamar)->get();
    }
}
