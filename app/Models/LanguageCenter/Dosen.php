<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'lac_dosen';
    protected $primaryKey = 'NIP';
    protected $fillable = [
        'NIP',
        'Nama'
    ];
    public $timestamps = false;

    public function getAll() {
        return $this->all();
    }

    public function getDosen($nip) {
        return $this->where('NIP', $nip)->get();
    }

    public function addDosen($nip, $nama) {
        return $this->insert([
            'NIP' => $nip,
            'Nama' => $nama
        ]);
    }

    public function editDosen($nip, $nama) {
        return $this->where('NIP', $nip)->update(['Nama' => $nama]);
    }

    public function deleteDosen($nip) {
        return $this->where('NIP', $nip)->delete();
    }
}