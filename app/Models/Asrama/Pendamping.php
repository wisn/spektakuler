<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    protected $table = 'asrama_pendamping';

    protected $fillable = [
        'nim',
        'id_kamar',
    ];

    public function list()
    {
        return $this->all();
    }

    public function new($data)
    {
        $this->nim = $data['nim'];
        $this->id_kamar = $data['id_kamar'];

        $this->save();
    }

    public function remove($nim)
    {
        $isExists = $this->where('nim', $nim)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('nim', $nim)->delete();
        }

        return false;
    }

    public function assigned($nim)
    {
        return $this->leftJoin('asrama_kamar', 'asrama_pendamping.id_kamar', '=', 'asrama_kamar.id_kamar')->get();
    }
}
