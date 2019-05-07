<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\Nilai;

class NilaiController extends Controller {
    public function __construct() {
        $this->Nilai = new Nilai;
    }

    public function getAllNilai() {
        return response()->json($this->Nilai->getAll(), 200);
    }

    public function getNilai($id) {
        return response()->json($this->Nilai->getNilai($id), 200);
    }

    public function getNilaiNIM($nim) {
      return response()->json($this->Nilai->getNilai($nim), 200);
    }

    public function addNilai($tgl, $tipe, $nim, $nama, $tipe_peserta, $ruangan, $nilai_total, $jenis_nilai) {
        return response()->json($this->Nilai->addNilai($tgl, $tipe, $nim, $nama, $tipe_peserta, $ruangan, $nilai_total, $jenis_nilai), 200);
    }

    public function editNilai($nim, $nama) {
        return response()->json($this->Nilai->editNilai($nim, $nama), 200);
    }

    public function deleteNilai($nim) {
        return response()->json($this->Nilai->deleteNilai($nim), 200);
    }
}