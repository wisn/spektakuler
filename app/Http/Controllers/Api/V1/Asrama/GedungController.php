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
          if (($kategori != 'putra' && $kategori != 'putri') || $kapasitas < 1) {
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
}
