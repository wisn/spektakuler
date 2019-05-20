<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Penghuni;
use App\Models\Asrama\Kamar;
use App\Models\Asrama\Mahasiswa;

class PenghuniController extends Controller
{
    public function __construct()
    {
        $this->penghuni = new Penghuni;
        $this->kamar = new Kamar;
        $this->mahasiswa = new Mahasiswa;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->penghuni->list(),
        ], 200);
    }

    public function listMahasiswa($id_mahasiswa)
    {
        return response()->json([
            'success' => true,
            'data' => $this->penghuni->listMahasiswa($id_mahasiswa),
        ], 200);
    }

    public function listKamar($id_kamar)
    {
        return response()->json([
            'success' => true,
            'data' => $this->penghuni->listKamar($id_kamar),
        ], 200);
    }

    public function detail($id_mahasiswa)
    {
        return response()->json([
            'success' => true,
            'data' => $this->penghuni->detail($id_mahasiswa),
        ], 200);
    }

    public function new(Request $request)
    {
        $id_mahasiswa = $request->input('id_mahasiswa');
        $id_kamar = $request->input('id_kamar');

        if ($id_mahasiswa == null || $id_kamar == null) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu atribut yang diperlukan kosong',
            ], 400);
        } else {
            $isExistsMahasiswa = count($this->mahasiswa->findById($id_mahasiswa)) == 1;
            $kamar = $this->kamar->findById($id_kamar);
            $isExistsKamar = count($kamar) == 1;

            if ($isExistsMahasiswa && $isExistsKamar) {
                $data = [
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_kamar' => $id_kamar,
                ];
                $this->penghuni->new($data);

                $data = ['tersisa' => $kamar[0]->tersisa - 1];
                $this->kamar->where('id_kamar', $id_kamar)->update($data);

                return response()->json([
                    'success' => true,
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Mahasiswa atau kamar tidak ada',
                ], 404);
            }
        }
    }

    public function show($id_mahasiswa)
    {
        $mahasiswa = $this->mahasiswa->findById($id_mahasiswa);
        $isExists = count($mahasiswa) == 1;

        if ($isExists) {
            return response()->json([
                'success' => true,
                'data' => $mahasiswa,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa yang dicari tidak ada',
            ], 404);
        }
    }

    public function showKamar($id_mahasiswa)
    {
        $mahasiswa = $this->penghuni->where('id_mahasiswa', $id_mahasiswa)->limit(1)->get();
        $isExists = count($mahasiswa) == 1;

        if ($isExists) {
            return response()->json([
                'success' => true,
                'data' => $this->penghuni->findKamar($id_mahasiswa, $mahasiswa[0]->id_kamar),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa yang dicari tidak ada',
            ], 404);
        }
    }

    public function remove($id_mahasiswa)
    {
        $penghuni = $this->penghuni->where('id_mahasiswa', $id_mahasiswa)->limit(1)->get();
        $isExists = count($penghuni) == 1;

        if ($isExists) {
            $success = $this->penghuni->remove($id_mahasiswa);

            if ($success) {
                $kamar = $this->kamar->findById($penghuni[0]->id_kamar);
                $data = ['tersisa' => $kamar[0]->tersisa + 1];

                $this->kamar->where('id_kamar', $penghuni[0]->id_kamar)->update($data);

                return response()->json([
                    'success' => true,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus data',
                ], 500);
            }
        }

        return false;
    }
}
