<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Gedung;
use App\Models\Asrama\Kamar;

class GedungController extends Controller
{
    public function __construct()
    {
        $this->gedung = new Gedung;
        $this->kamar = new Kamar;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->gedung->list(),
        ], 200);
    }

    public function listPutra()
    {
        return response()->json([
            'success' => true,
            'data' => $this->gedung->listPutra(),
        ], 200);
    }

    public function listPutri()
    {
        return response()->json([
            'success' => true,
            'data' => $this->gedung->listPutri(),
        ], 200);
    }

    public function listKamar($id_gedung) {
        return response()->json([
            'success' => true,
            'data' => $this->gedung->listKamar($id_gedung),
        ]);
    }

    public function show($id_gedung) {
        $gedung = $this->gedung->findById($id_gedung);
        $isExists = count($gedung) == 1;

        if ($isExists) {
            return response()->json([
                'success' => true,
                'data' => $gedung[0],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dicari tidak ada',
            ], 404);
        }
    }

    public function new(Request $request) {
        $nama = $request->input('nama');
        $kategori = $request->input('kategori');
        $kapasitas = $request->input('kapasitas');
        $tersisa = $kapasitas;
        $lokasi = $request->input('lokasi');

        if ($nama == null || $kategori == null || $kapasitas == null) {
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
                    'tersisa' => $tersisa,
                    'lokasi' => $lokasi,
                ];
                $this->gedung->new($data);

                return response()->json([
                    'success' => true,
                    'data' => $data,
                ], 201);
            }
        }
    }

    public function update($id_gedung, Request $request) {
        $gedung = $this->gedung->findById($id_gedung);
        $isExists = count($gedung) == 1;

        if ($isExists) {
            $gedung = $gedung[0];
            $nama = $request->input('nama') ?: $gedung['nama'];
            $kategori = $request->input('kategori') ?: $gedung['kategori'];
            $kapasitas = $request->input('kapasitas') ?: $gedung['kapasitas'];
            $tersisa = $gedung['tersisa'] + ($request->input('kapasitas') - $gedung['kapasitas']);
            $lokasi = $request->input('lokasi') ?: $gedung['lokasi'];

            if ($kategori == null || $kapasitas == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Salah satu atribut yang diperlukan kosong',
                ], 400);
            } else {
                if (!($this->isValidKategori($kategori)) || $kapasitas < 1 || $tersisa < 0 || $tersisa > $kapasitas) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Untuk beberapa atribut masukkannya tidak sesuai',
                    ], 400);
                } else {       
                    $data = [
                        'nama' => $nama,
                        'kategori' => $kategori,
                        'kapasitas' => $kapasitas,
                        'tersisa' => $tersisa,
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

    public function remove($id_gedung) {
        $this->kamar->where('id_gedung', $id_gedung)->delete();
        $success = $this->gedung->remove($id_gedung);
        if ($success) {
            return response()->json([
              'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data',
            ], 500);
        }
    }

    private function isValidKategori($kategori) {
        return $kategori == 'putra' || $kategori == 'putri';
    }
}
