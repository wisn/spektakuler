<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Kamar;
use App\Models\Asrama\Gedung;

class KamarController extends Controller
{
    public function __construct()
    {
        $this->kamar = new Kamar;
        $this->gedung = new Gedung;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->kamar->list(),
        ], 200);
    }

    public function listAvailable()
    {
        return response()->json([
            'success' => true,
            'data' => $this->gedung->listAvailable(),
        ], 200);
    }

    public function show($id_kamar) {
        $kamar = $this->kamar->findById($id_kamar);
        $isExists = count($kamar) == 1;

        if ($isExists) {
            return response()->json([
                'success' => true,
                'data' => $kamar[0],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dicari tidak ada',
            ], 404);
        }
    }

    public function new(Request $request) {
        $no_kamar = $request->input('no_kamar');
        $id_gedung = $request->input('id_gedung');
        $kategori = $request->input('kategori');
        $kapasitas = $request->input('kapasitas');
        $tersisa = $request->input('tersisa');

        if ($no_kamar == null || $id_gedung == null || $kategori == null || $kapasitas == null || $tersisa == null) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu atribut yang diperlukan kosong',
            ], 400);
        } else {
            if ($tersisa < 0 || $kapasitas < 1 || $kapasitas < $tersisa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Untuk beberapa atribut masukannya tidak sesuai',
                ], 400);
            } else {
                $gedung = $this->gedung->findById($id_gedung);
                $isValidGedung = count($gedung) == 1;
                if ($isValidGedung && $gedung[0]->tersisa > 0) {
                    $tersisa = $tersisa ?: $kapasitas;

                    $data = [
                        'no_kamar' => $no_kamar,
                        'id_gedung' => $id_gedung,
                        'kategori' => $kategori,
                        'kapasitas' => $kapasitas,
                        'tersisa' => $tersisa,
                    ];
                    $this->kamar->new($data);

                    $gedung = ['tersisa' => $gedung[0]->tersisa - 1];
                    $this->gedung->where('id_gedung', $id_gedung)->update($gedung);

                    return response()->json([
                        'success' => true,
                        'data' => $data,
                      ], 201);
                } else if ($gedung[0]->tersisa == 0) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gedung sudah penuh',
                    ], 400);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Data yang dicari tidak ada',
                    ], 404);
                }
            }
        }
    }

    public function update($id_kamar, Request $request) {
        $kamar = $this->kamar->where('id_kamar', $id_kamar)->limit(1)->get();
        $isExists = count($kamar) == 1;

        if ($isExists) {
            $kamar = $kamar[0];
            $no_kamar = $request->input('no_kamar') ?: $kamar['no_kamar'];
            $id_gedung = $kamar['id_gedung'];
            $kategori = $request->input('kategori') ?: $kamar['kategori'];
            $kapasitas = $request->input('kapasitas') ?: $kamar['kapasitas'];
            $tersisa = $kamar['tersisa'] + ($request->input('kapasitas') - $kamar['kapasitas']);

            if ($no_kamar == null || $id_gedung == null || $kategori == null || $kapasitas == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Salah satu atribut yang diperlukan kosong',
                  ], 400);
            } else {
                if ($tersisa < 0 || $kapasitas < 1 || $kapasitas < $tersisa) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Untuk beberapa atribut masukkannya tidak sesuai',
                    ], 400);
                } else {
                    $data = [
                        'no_kamar' => $no_kamar,
                        'id_gedung' => $id_gedung,
                        'kategori' => $kategori,
                        'kapasitas' => $kapasitas,
                        'tersisa' => $tersisa,
                      ];
                    $this->kamar->where('id_kamar', $id_kamar)->update($data);

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

    public function remove($id_kamar) {
        $kamar = $this->kamar->findById($id_kamar)[0];
        $success = $this->kamar->remove($id_kamar);
        if ($success) {
            $gedung = $this->gedung->findById($kamar->id_gedung)[0];
            $gedung = ['tersisa' => $gedung->tersisa + 1];
            $this->gedung->where('id_gedung', $kamar->id_gedung)->update($gedung);

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
}
