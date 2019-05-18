<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'lac_ruangan';
    protected $fillable = [
        'Kode_Ruangan',
        'Kapasitas'
    ];
    public $timestamps = false;

    public function getAll() {
        return $this->all();
    }

    public function getRuangan($noruang) {
        return $this->where('Kode_Ruangan', $noruang)->get();
    }

    public function addRuangan($noruang, $kapasitas) {
        return $this->insert([
            'Kode_Ruangan' => $noruang,
            'Kapasitas' => $kapasitas
        ]);
    }

    public function editRuangan($noruang, $kapasitas) {
        return $this->where('Kode_Ruangan', $noruang)->update(['Kapasitas' => $kapasitas]);
    }

    public function deleteRuangan($noruang) {
        return $this->where('Kode_Ruangan', $noruang)->delete();
    }
}