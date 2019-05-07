<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\Keanggotaan;

class MembershipController extends Controller {
    public function __construct() {
        $this->Keanggotaan = new Keanggotaan;
    }

    public function getAllKeanggotaan() {
        return response()->json($this->Keanggotaan->getAll(), 200);
    }

    public function getKeanggotaan($nim) {
        return response()->json($this->Keanggotaan->getKeanggotaan($nim), 200);
    }

    public function addKeanggotaan($nim, $nama, $status, $expire, $pembayaran) {
        return response()->json($this->Keanggotaan->addKeanggotaan($nim, $nama), 200);
    }

    public function editKeanggotaan($nim, $status, $expire, $pembayaran) {
        return response()->json($this->Keanggotaan->editKeanggotaan($nim, $nama), 200);
    }

    public function deleteKeanggotaan($nim) {
        return response()->json($this->Keanggotaan->deleteKeanggotaan($nim), 200);
    }
}