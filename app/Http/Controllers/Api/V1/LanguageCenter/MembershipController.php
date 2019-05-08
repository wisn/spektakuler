<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\Keanggotaan;

class MembershipController extends Controller {
    public function __construct() {
        $this->Keanggotaan = new Keanggotaan;
    }

    public function getAllMembership() {
        return response()->json($this->Keanggotaan->getAll(), 200);
    }

    public function getMembership($nim) {
        return response()->json($this->Keanggotaan->getKeanggotaan($nim), 200);
    }

    public function addMembership($nim, $nama, $status, $expire, $pembayaran) {
        return response()->json($this->Keanggotaan->addKeanggotaan($nim, $nama), 200);
    }

    public function editMembership($nim, $status, $expire, $pembayaran) {
        return response()->json($this->Keanggotaan->editKeanggotaan($nim, $nama), 200);
    }

    public function deleteMembership($nim) {
        return response()->json($this->Keanggotaan->deleteKeanggotaan($nim), 200);
    }
}