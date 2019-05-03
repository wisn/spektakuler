<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Gedung;

class GedungController extends Controller
{
    public function __construct()
    {
        $this->gedung = new Gedung;
    }

    public function list()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->gedung->list(),
        ], 200);
    }

    public function listPutra()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->gedung->listPutra(),
        ], 200);
    }

    public function listPutri()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->gedung->listPutri(),
        ], 200);
    }

    public function new(Request $request) {
        $nama = $request->input('nama');
        $kategori = $request->input('kategori');
        $kapasitas = $request->input('kapasitas');
        $lokasi = $request->input('lokasi');

        if ($nama == null || $kategori == null || $kapasitas == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {
            if (!($this->isValidKategori($kategori)) || $kapasitas < 1) {
                return response()->json([
                    'success' => 'false',
                    'message' => 'Bad inputs for several attributes',
                ], 400);
            } else {
                $data = [
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'kapasitas' => $kapasitas,
                    'lokasi' => $lokasi,
                ];
                $this->gedung->new($data);

                return response()->json([
                    'success' => 'true',
                    'data' => $data,
                ], 201);
            }
        }
    }

    public function update($nama, Request $request) {
        $gedung = $this->gedung->where('nama', $nama)->limit(1)->get();
        $isExists = count($gedung) == 1;

        if ($isExists) {
            $gedung = $gedung[0];
            $kategori = $request->input('kategori') ?: $gedung['kategori'];
            $kapasitas = $request->input('kapasitas') ?: $gedung['kapasitas'];
            $lokasi = $request->input('lokasi') ?: $gedung['lokasi'];

            if ($kategori == null || $kapasitas == null) {
                return response()->json([
                    'success' => 'false',
                    'message' => 'One of the required attributes were empty',
                ], 400);
            } else {
                if (!($this->isValidKategori($kategori)) || $kapasitas < 1) {
                    return response()->json([
                        'success' => 'false',
                        'message' => 'Bad inputs for several attributes',
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
                        'success' => 'true',
                        'data' => $data,
                    ], 200);
                }
            }
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Record not found',
            ], 404);
        }
    }

    public function remove($nama) {
        $success = $this->gedung->remove($nama);
        if ($success) {
            return response()->json([
              'success' => 'true',
            ], 200);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed removing record',
            ], 500);
        }
    }

    private function isValidKategori($kategori) {
        return $kategori == 'putra' || $kategori == 'putri';
    }
}
