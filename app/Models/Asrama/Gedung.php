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

    public function new($data) {
        $this->nama = $data['nama'];
        $this->kategori = $data['kategori'];
        $this->kapasitas = $data['kapasitas'];
        $this->lokasi = $data['lokasi'];

        $this->save();
    }
}
