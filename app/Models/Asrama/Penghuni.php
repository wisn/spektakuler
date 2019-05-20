<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $table = 'asrama_penghuni';

    protected $fillable = [
        'id_mahasiswa',
        'id_kamar',
    ];

    public function list()
    {
        return $this->all();
    }

    public function findByIds($id_mahasiswa, $id_kamar)
    {
        return $this->where([['id_mahasiswa', $id_mahasiswa], ['id_kamar', $id_kamar]])->limit(1)->get();
    }

    public function findKamar($id_mahasiswa, $id_kamar)
    {
        return $this->join('asrama_kamar', function ($join) use ($id_mahasiswa, $id_kamar) {
            $join->on('asrama_penghuni.id_kamar', '=', 'asrama_kamar.id_kamar')
                ->where([
                    ['asrama_penghuni.id_mahasiswa', $id_mahasiswa],
                    ['asrama_penghuni.id_kamar', $id_kamar],
                  ]);
        })->get();
    }

    public function new($data)
    {
        $this->id_mahasiswa = $data['id_mahasiswa'];
        $this->id_kamar = $data['id_kamar'];

        return $this->save();
    }

    public function remove($id_mahasiswa)
    {
        $sr = $this->where('id_mahasiswa', $id_mahasiswa)->limit(1)->get();
        $isExists = count($sr) == 1;

        if ($isExists) {
            return $this->where('id_mahasiswa', $id_mahasiswa)->delete();
        }

        return false;
    }
}
