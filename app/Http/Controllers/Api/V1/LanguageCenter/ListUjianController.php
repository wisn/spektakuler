<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use App\Models\LanguageCenter\ListUjian;

class ListUjianController extends Controller {
    public function __construct() {
        $this->ListUjian = new ListUjian;
    }

    public function getAllListUjian() {
        return response()->json($this->ListUjian->getAll(), 200);
    }

    public function getListUjian($id) {
        return response()->json($this->ListUjian->getListUjian($id), 200);
    }

    public function addListUjian($nama, $tipe, $biaya) {
        return response()->json($this->ListUjian->addListUjian($nama, $tipe, $biaya), 200);
    }

    public function editListUjian($id, $nama, $tipe, $biaya) {
        return response()->json($this->ListUjian->editListUjian($id, $nama, $tipe, $biaya), 200);
    }

    public function deleteListUjian($id) {
        return response()->json($this->ListUjian->deleteListUjian($id), 200);
    }
}