<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'lac_mahasiswa';
    protected $primaryKey = 'NIM';
    protected $fillable = [
        'NIM',
        'Nama'
    ];
    public $timestamps = false;

    public function getAll() {
        return $this->all();
    }

    public function getMahasiswa($nim) {
        return $this->where('NIM', $nim)->get();
    }

    public function addMahasiswa($nim, $nama) {
        return $this->insert([
            'NIM' => $nim,
            'Nama' => $nama
        ]);
    }

    public function editMahasiswa($nim, $nama) {
        return $this->where('NIM', $nim)->update(['Nama' => $nama]);
    }

    public function deleteMahasiswa($nim) {
        return $this->where('NIM', $nim)->delete();
    }
}