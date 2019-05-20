<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use Illuminate\Http\Request;
use App\Models\Asrama\Pendamping;
use App\Models\Asrama\Penghuni;
use App\Models\Asrama\Kamar;
use App\Models\Asrama\SeniorResidence;
use App\Models\StudentManagement\Mahasiswa;

class SeniorResidenceController extends Controller
{
    public function __construct()
    {
        $this->sr = new SeniorResidence;
        $this->mahasiswa = new Mahasiswa;
        $this->penghuni = new Penghuni;
        $this->pendamping = new Pendamping;
        $this->kamar = new Kamar;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->sr->list(),
        ], 200);
    }

    public function listAssigned()
    {
        return response()->json([
            'success' => true,
            'data' => $this->sr->listAssigned(),
        ], 200);
    }

    public function listUnassigned()
    {
        return response()->json([
            'success' => true,
            'data' => $this->sr->listUnassigned(),
        ], 200);
    }

    public function show($id_sr)
    {
        $sr = $this->sr->findById($id_sr);
        $isExists = count($sr) == 1;

        if ($isExists) {
            return response()->json([
                'success' => true,
                'data' => $sr[0],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dicari tidak ada',
            ], 404);
        }
    }

    public function remove($id_sr)
    {
        $success = $this->sr->remove($id_sr);
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

    public function new(Request $request)
    {
        $nim = $request->input('nim');
        $username = $request->input('username');
        $password = $request->input('password');

        if ($nim == null || $username == null || $password == null) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu atribut yang diperlukan kosong',
            ], 400);
        } else {
            $isExistsNIM = count($this->sr->findByNIM($nim)) == 1;
            if ($isExistsNIM) {
                return response()->json([
                    'success' => false,
                    'message' => 'SR dengan NIM ' . $nim . ' sudah ada',
                ], 400);
            } else {
                $mahasiswa = $this->mahasiswa->findByNIM($nim);
                $isNotExistsStudent = count($mahasiswa) == 0;
                if ($isNotExistsStudent) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Tidak ada mahasiswa dengan NIM ' . $nim,
                    ], 400);
                } else {
                    $mahasiswa = $mahasiswa[0];
                    if ($mahasiswa->angkatan == date('Y')) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Mahasiswa baru tidak dapat menjadi SR',
                        ], 400);
                    } else {
                        $isUsedUsername = count($this->sr->findByUsername($username)) == 1;
                        if ($isUsedUsername) {
                            return response()->json([
                                'success' => false,
                                'message' => 'Username ' . $username . ' sudah digunakan',
                            ], 400);
                        } else {
                            $data = [
                                'nim' => $nim,
                                'username' => $username,
                                'password' => $password,
                            ];
                            $this->sr->new($data);

                            return response()->json([
                                'success' => true,
                            ], 201);
                        }
                    }
                }
            }
        }
    }

    public function update($id_sr, Request $request) {
        $sr = $this->sr->findById($id_sr);
        $isExists = count($sr) == 1;

        if ($isExists) {
            $sr = $sr[0];
            $username = $request->input('username') ?: $sr['username'];
            $password = $request->input('password') ?: $sr['password'];
            $id_gedung = $request->input('id_gedung') ?: $sr['id_gedung'];

            if ($request->input('id_gedung') == 0) {
                $id_gedung = 0;
            }

            if ($username == null || $password == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Salah satu atribut yang diperlukan kosong',
                ], 400);
            } else {
                $data = [
                    'username' => $username,
                    'password' => $password,
                    'id_gedung' => $id_gedung,
                ];
                $this->sr->where('id_sr', $id_sr)->update($data);

                if ($id_gedung == 0) {
                    $this->pendamping->where('id_sr', $sr->id_sr)->delete();
                    $query = $this->penghuni->where('id_mahasiswa', $sr->id_mahasiswa);
                    $id_kamar = $query->get()[0]->id_kamar;
                    $query->delete();
                    $kamar = $this->kamar->findById($id_kamar)[0];
                    $this->kamar->where('id_kamar', $id_kamar)->update(['tersisa' => $kamar->tersisa + 1]);
                }

                return response()->json([
                    'success' => true,
                    'data' => $sr,
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dicari tidak ada',
            ], 404);
        }
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
          $sr = $this->sr->findByUsername($username);
          $isExists = count($sr) == 1;

          if ($isExists && $sr[0]['password'] == $password) {
              return response()->json([
                  'success' => true,
                  'data' => $sr[0],
              ], 200);
          } else {
              return response()->json([
                  'success' => false,
                  'message' => 'Username atau password salah',
              ], 404);
          }
        }
    }
}
