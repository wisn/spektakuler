<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\Mahasiswa;

class MahasiswaController extends Controller {
    public function __construct() {
        $this->Mahasiswa = new Mahasiswa;
    }

    public function getAllMahasiswa() {
        return response()->json($this->Mahasiswa->getAll(), 200);
    }

    public function getMahasiswa($nim) {
        return response()->json($this->Mahasiswa->getMahasiswa($nim), 200);
    }

    public function addMahasiswa($nim, $nama) {
        return response()->json($this->Mahasiswa->addMahasiswa($nim, $nama), 200);
    }

    public function editMahasiswa($nim, $nama) {
        return response()->json($this->Mahasiswa->editMahasiswa($nim, $nama), 200);
    }

    public function deleteMahasiswa($nim, $nama) {
        return response()->json($this->Mahasiswa->deleteMahasiswa($nim), 200);
    }
}