<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\HistoryUjian;

class HistoryController extends Controller {
    public function __Construct() {
        $this->History = new HistoryUjian;
    }

    public function getAllHistory() {
        return response()->json($this->History->getAll(), 200);
    }

    public function getHistory($id) {
        return response()->json($this->History->getHistory($id), 200);
    }

    public function getHistoryNIM($NIM) {
        return response()->json($this->History->getHistoryNIM($NIM), 200);
    }

    public function addHistory($NIM, $Nama, $tgl_test, $tgl_daftar, $tipe_test, $tipe_peserta, $ruangan, $status_bayar, $status_setuju) {
        $object = [
            'NIM' => $NIM,
            'Nama' => $Nama,
            'Tgl_Test' => $tgl_test,
            'Tgl_Daftar' => $tgl_daftar,
            'Tipe_Test' => $tipe_test,
            'Tipe_Peserta' => $tipe_peserta,
            'Ruangan' => $ruangan,
            'Status_Pembayaran' => $status_bayar,
            'Status_Persetujuan' => $status_setuju
        ];
        return response()->json($this->History->addHistory($object), 200);
    }

    public function editHistory($id, $status_bayar, $status_setuju) {
        return response()->json($this->History->editHistory($id, $status_bayar, $status_setuju), 200);
    }

    public function deleteHistory($id) {
        return response()->json($this->History->deleteHistory($id), 200);
    }
}