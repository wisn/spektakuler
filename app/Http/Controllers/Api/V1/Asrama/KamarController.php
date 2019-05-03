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
            'success' => 'true',
            'data' => $this->kamar->list(),
        ], 200);
    }

    public function listAvailable()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->gedung->listAvailable(),
        ], 200);
    }

    public function new(Request $request) {
        $no_kamar = $request->input('no_kamar');
        $nama_gedung = $request->input('nama_gedung');
        $kapasitas = $request->input('kapasitas');
        $tersisa = $request->input('tersisa');

        if ($no_kamar == null || $nama_gedung == null || $kapasitas == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {
            if ($tersisa < 0 || $kapasitas < 1 || $kapasitas < $tersisa) {
                return response()->json([
                    'success' => 'false',
                    'message' => 'Bad inputs for several attributes',
                ], 400);
            } else {
                $gedung = $this->gedung->findByNama($nama_gedung);
                $isValidGedung = count($gedung) == 1;
                if ($isValidGedung) {
                    $tersisa = $tersisa ?: $kapasitas;

                    $data = [
                        'no_kamar' => $no_kamar,
                        'nama_gedung' => $nama_gedung,
                        'kapasitas' => $kapasitas,
                        'tersisa' => $tersisa,
                    ];
                    $this->kamar->new($data);

                    return response()->json([
                        'success' => 'true',
                        'data' => $data,
                      ], 201);
                } else {
                    return response()->json([
                        'success' => 'false',
                        'message' => 'The building were not found',
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
            $nama_gedung = $request->input('nama_gedung') ?: $kamar['nama_gedung'];
            $kapasitas = $request->input('kapasitas') ?: $kamar['kapasitas'];
            $tersisa = $request->input('tersisa') ?: $kamar['tersisa'];

            if ($no_kamar == null || $nama_gedung == null || $kapasitas == null) {
                return response()->json([
                    'success' => 'false',
                    'message' => 'One of the required attributes were empty',
                  ], 400);
            } else {
                if ($tersisa < 0 || $kapasitas < 1 || $kapasitas < $tersisa) {
                    return response()->json([
                        'success' => 'false',
                        'message' => 'Bad inputs for several attributes',
                    ], 400);
                } else {
                    $data = [
                        'no_kamar' => $no_kamar,
                        'nama_gedung' => $nama_gedung,
                        'kapasitas' => $kapasitas,
                        'tersisa' => $tersisa,
                      ];
                    $this->kamar->where('id_kamar', $id_kamar)->update($data);

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

    public function remove($id_kamar) {
        $success = $this->kamar->remove($id_kamar);
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
}
