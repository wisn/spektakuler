<?php

namespace App\Models\LanguageCenter;

use Illuminate\Database\Eloquent\Model;

class ListUjian extends Model
{
    protected $table = 'lac_list_ujian';
    protected $fillable = [
        'nama_ujian',
        'Tipe_Ujian',
        'Biaya_Ujian'
    ];
    public $timestamps = false;

    public function getAll() {
        return $this->all();
    }

    public function getListUjian($id) {
        return $this->where('id', $id)->get();
    }

    public function addListUjian($nama, $tipe, $biaya) {
        return $this->insert([
            'nama_ujian' => $nama,
            'Tipe_Ujian' => $tipe,
            'Biaya_Ujian' => $biaya
        ]);
    }

    public function editListUjian($id, $nama, $tipe, $biaya) {
        return $this->where('id', $id)
        ->update([
            'nama_ujian' => $nama,
            'Tipe_Ujian' => $tipe,
            'Biaya_Ujian' => $biaya
            ]);
    }

    public function deleteListUjian($noruang) {
        return $this->where('Kode_Ruangan', $noruang)->delete();
    }
}