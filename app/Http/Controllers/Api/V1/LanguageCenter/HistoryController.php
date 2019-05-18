<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\HistoryUjian;
use Carbon\Carbon;

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

    public function addHistory($NIM, $Nama, $ruangan, $status_bayar, $jenis, $daftar, $sekarang, $tipetes, $status_setuju, $tipeorang) {
        $object = [
            'NIM' => $NIM,
            'Nama' => $Nama,
            'Tgl_Test' => Carbon::parse($daftar)->format('Y-m-d'),
            'Tgl_Daftar' => Carbon::parse($sekarang)->format('Y-m-d'),
            'Tipe_Test' => $tipetes,
            'Tipe_Peserta' => $status_setuju,
            'Ruangan' => $tipeorang,
            'Status_Pembayaran' => $jenis?1:0,
            'Status_Persetujuan' => $ruangan?1:0,
            'Jenis_History' => $status_bayar
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