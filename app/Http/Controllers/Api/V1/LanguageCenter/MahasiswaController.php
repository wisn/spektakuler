<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\Mahasiswa;

class MahasiswaController extends Controller {
    public function __construct() {
        $this->Mahasiswa = new Mahasiswa;
    }

    public function getMahasiswa() {
        return response()->json($this->Mahasiswa->getMahasiswa(), 200);
    }
}