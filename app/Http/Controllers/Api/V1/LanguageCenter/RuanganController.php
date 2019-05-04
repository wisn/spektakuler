<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\Ruangan;

class RuanganController extends Controller {
    public function __Construct() {
        $this->Ruangan = new Ruangan;
    }

    public function getAllRuangan() {
        return response()->json($this->Ruangan->getAll(), 200);
    }

    public function getRuangan($noruang) {
        return response()->json($this->Ruangan->getRuangan($noruang), 200);
    }

    public function addRuangan($noruang, $kapasitas) {
        return response()->json($this->Ruangan->addRuangan($noruang, $kapasitas), 200);
    }

    public function editRuangan($noruang, $kapasitas) {
        return response()->json($this->Ruangan->editRuangan($noruang, $kapasitas), 200);
    }

    public function deleteRuangan($noruang) {
        return response()->json($this->Ruangan->deleteRuangan($noruang), 200);
    }
}