<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Kamar;
use App\Models\Asrama\Pendamping;
use App\Models\StudentManagement\Mahasiswa;

class PendampingController extends Controller
{
    public function __construct()
    {
        $this->kamar = new Kamar;
        $this->pendamping = new Pendamping;
        $this->mahasiswa = new Mahasiswa;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->gedung->list(),
        ], 200);
    }

    public function new(Request $request)
    {
        $nim = $request->input('nim');
        $id_kamar = $request->input('id_kamar');

        if ($nim == null || $id_kamar == null) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu atribut yang diperlukan kosong',
            ], 400);
        } else {
            $mahasiswa = $this->mahasiswa->findByNim($nim);
            $isMahasiswaExists = count($mahasiswa) == 1;
            $kamar = $this->kamar->findByIdKamar($id_kamar);
            $isKamarExists = count($kamar) == 1;
            if (!$isMahasiswaExists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Mahasiswa yang dimaksud tidak ada',
                ], 400);
            } else if (!$isKamarExists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kamar yang dimaksud tidak ada',
                ], 400);
            } else {
                $data = [
                    'nim' => $nim,
                    'id_kamar' => $id_kamar,
                ];
                $this->pendamping->new($data);

                return response()->json([
                    'success' => true,
                    'data' => $data,
                ], 201);
            }
        }
    }

    public function assigned($nim, Request $request)
    {
        $assigned = $this->pendamping->assigned($nim);
        if (count($assigned) == 0) {
            return response()->json([
                'success' => true,
                'data' => [],
            ], 404);
        } else {
            return response() ->json([
                'success' => true,
                'data' => $assigned,
            ], 200);
        }
    }

    /*public function update($nim, $id_kamar, Request $request) {
        $pendamping = $this->pendamping->findByNimAndKamar($nim, $id_kamar);
        $isExists = count($pendamping) == 1;

        if ($isExists) {
            $pendamping = $pendamping[0];
            $nim = $request->input('nim') ?: $nim;
            $id_kamar = $request->input('id_kamar') ?: $id_kamar;

            if ($nim == null || $id_kamar == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Salah satu atribut yang diperlukan kosong',
                ], 400);
            } else {
                if (!($this->isValidKategori($kategori)) || $kapasitas < 1) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Untuk beberapa atribut masukkannya tidak sesuai',
                    ], 400);
                } else {       
                    $data = [
                        'nama' => $nama,
                        'kategori' => $kategori,
                        'kapasitas' => $kapasitas,
                        'lokasi' => $lokasi,
                    ];
                    $this->gedung->where('nama', $nama)->update($data);

                    return response()->json([
                        'success' => true,
                        'data' => $data,
                    ], 200);
                }
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dicari tidak ada',
            ], 404);
        }
    }

    public function remove($nama) {
        $success = $this->gedung->remove($nama);
        if ($success) {
            return response()->json([
              'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data yang ingin dihapus tidak ada',
            ], 500);
        }
    }

    private function isValidKategori($kategori) {
        return $kategori == 'putra' || $kategori == 'putri';
    }*/
}
