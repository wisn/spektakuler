<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'asrama_kamar';

    protected $fillable = [
        'no_kamar',
        'nama_gedung',
        'kapasitas',
        'tersisa',
    ];

    public function list()
    {
        return $this->all();
    }

    public function listAvailable()
    {
        return $this->where('tersisa', '>', 0)->get();
    }

    public function new($data) {
        $this->no_kamar = $data['no_kamar'];
        $this->nama_gedung = $data['nama_gedung'];
        $this->kapasitas = $data['kapasitas'];
        $this->tersisa = $data['tersisa'];

        $this->save();
    }

    public function remove($id_kamar) {
        $isExists = $this->where('id_kamar', $id_kamar)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('id_kamar', $id_kamar)->delete();
        }

        return false;
    }
}
