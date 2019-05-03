<?php

namespace App\Http\Controllers\Api\V1\StudentManagement;

use Illuminate\Http\Request;
use App\Models\StudentManagement\Mahasiswa;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa;
    }

    public function list()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->mahasiswa->list(),
        ], 200);
    }

    public function new(Request $request) {
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $angkatan = $request->input('angkatan');
        $fakultas = $request->input('fakultas');
        $program_studi = $request->input('program_studi');
        $alamat = $request->input('alamat');

        if ($nim == null || $nama == null || $angkatan == null || $fakultas == null || $program_studi == null || $alamat == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {
            if ($fakultas != 'FIF' && $fakultas != 'FTE') {
                return response()->json([
                    'success' => 'false',
                    'message' => 'Bad inputs for several attributes',
                ], 400);
            } else {
                $data = [
                    'nim' => $nim,
                    'nama' => $nama,
                    'angkatan' => $angkatan,
                    'fakultas' => $fakultas,
                    'program_studi' => $program_studi,
                    'alamat' => $alamat,
                ];
                $this->mahasiswa->new($data);

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

    public function remove($nim) {
        $success = $this->mahasiswa->remove($nim);
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
