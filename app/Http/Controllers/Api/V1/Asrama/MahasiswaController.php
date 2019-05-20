<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Mahasiswa;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->mahasiswa->list(),
        ], 200);
    }

    public function listDetail() {
        return response()->json([
            'success' => true,
            'data' => $this->mahasiswa->listDetail(),
        ], 200);
    }

    public function isSr($id_mahasiswa) {
        return response()->json([
            'success' => true,
            'data' => $this->mahasiswa->isSr($id_mahasiswa),
        ], 200);
    }

    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username == null || $password == null) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu atribut yang diperlukan kosong',
            ], 400);
        } else {
            $mahasiswa = $this->mahasiswa->findByUsername($username);
            $isExists = count($mahasiswa) == 1;

            if ($isExists && $mahasiswa[0]['password'] == $password) {
                return response()->json([
                    'success' => true,
                    'data' => $mahasiswa,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Username atau password salah',
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
}
