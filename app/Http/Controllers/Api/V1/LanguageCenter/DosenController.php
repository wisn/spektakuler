<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\Dosen;

class DosenController extends Controller {
    public function __Construct() {
        $this->Dosen = new Dosen;
    }

    public function getAllDosen() {
        return response()->json($this->Dosen->getAll(), 200);
    }

    public function getDosen($nip) {
        return response()->json($this->Dosen->getDosen($nip), 200);
    }

    public function addDosen($nip, $nama) {
        return response()->json($this->Dosen->addDosen($nip, $nama), 200);
    }

    public function editDosen($nip, $nama) {
        return response()->json($this->Dosen->editDosen($nip, $nama), 200);
    }

    public function deleteDosen($nip) {
        return response()->json($this->Dosen->deleteDosen($nip), 200);
    }
}