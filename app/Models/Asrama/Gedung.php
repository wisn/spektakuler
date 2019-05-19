<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $table = 'asrama_gedung';

    protected $fillable = [
        'nama',
        'kategori',
        'kapasitas',
        'tersisa',
        'lokasi',
    ];

    public function list()
    {
        return $this->all();
    }

    public function listPutra()
    {
        return $this->where('kategori', 'putra')->get();
    }

    public function listPutri()
    {
        return $this->where('kategori', 'putri')->get();
    }

    public function listKamar($id_gedung) {
        return $this->join('asrama_kamar', function ($join) use ($id_gedung) {
            $join->on('asrama_kamar.id_gedung', '=', 'asrama_gedung.id_gedung')
                ->where('asrama_kamar.id_gedung', '=', $id_gedung);
        })->get();
    }

    public function findById($id_gedung) {
        return $this->where('id_gedung', $id_gedung)->limit(1)->get();
    }

    public function new($data) {
        $this->nama = $data['nama'];
        $this->kategori = $data['kategori'];
        $this->kapasitas = $data['kapasitas'];
        $this->tersisa = $data['tersisa'];
        $this->lokasi = $data['lokasi'];

        $this->save();
    }

    public function remove($id_gedung) {
        $isExists = $this->where('id_gedung', $id_gedung)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('id_gedung', $id_gedung)->delete();
        }

        return false;
    }

    public function findByNama($nama) {
        return $this->where('nama', $nama)->get();
    }
}
