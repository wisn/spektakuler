<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Pendamping;
use App\Models\Asrama\Kamar;
use App\Models\Asrama\SeniorResidence;

class PendampingController extends Controller
{
    public function __construct()
    {
        $this->pendamping = new Pendamping;
        $this->kamar = new Kamar;
        $this->sr = new SeniorResidence;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->pendamping->list(),
        ], 200);
    }

    public function new(Request $request)
    {
        $id_sr = $request->input('id_sr');
        $id_kamar = $request->input('id_kamar');

        if ($id_sr == null || $id_kamar == null) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu atribut yang diperlukan kosong',
            ], 400);
        } else {
            $isExistsSr = count($this->sr->findById($id_sr)) == 1;
            $kamar = $this->kamar->findById($id_kamar);
            $isExistsKamar = count($kamar) == 1;

            if ($isExistsSr && $isExistsKamar) {
                $isAssigned = count($this->pendamping->findByKamarId($id_kamar)) == 1;
                if (!$isAssigned) {
                    $data = [
                        'id_sr' => $id_sr,
                        'id_kamar' => $id_kamar,
                    ];
                    $this->pendamping->new($data);

                    return response()->json([
                        'success' => true,
                    ], 201);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Kamar sudah ada pendampingnya',
                    ], 400);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Mahasiswa atau kamar tidak ada',
                ], 404);
            }
        }
    }

    public function listBySr($id_sr)
    {
        $pendampingan = $this->pendamping->listById($id_sr);
        $isExists = count($pendampingan) > 0;

        if ($isExists) {
            return response()->json([
                'success' => true,
                'data' => $pendampingan,
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'data' => [],
            ], 200);
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

    public function remove($id_sr, $id_kamar)
    {
        $sr = $this->sr->where('id_sr', $id_sr)->limit(1)->get();
        $isExists = count($sr) == 1;

        if ($isExists) {
            $success = $this->pendamping->remove($id_sr, $id_kamar);

            if ($success) {
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

    public function mahasiswa($id_mahasiswa)
    {
        $pendamping = $this->pendamping->findByIdMahasiswa($id_mahasiswa);

        return response()->json([
            'success' => true,
            'data' => $pendamping,
        ], 200);
    }
}
