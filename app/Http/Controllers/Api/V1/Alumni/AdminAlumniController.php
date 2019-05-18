<?php

namespace App\Http\Controllers\Api\V1\Alumni;

use Illuminate\Http\Request;
use App\Models\Alumni\Admin;

class AdminAlumniController extends Controller
{
    public function __construct()
    {
        $this->Admin = new Admin;
    }

    public function index()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->Admin->listAdmin(),
        ], 200);
    }

    public function findAdmin($idAdmin)
    {
       return response()->json([
        'success' => 'true',
        'data' => $this->Admin->findbyAdmin($idAdmin),
        ], 200);
    }

    public function newAdmin(Request $request) {
        $idAdmin = $request->input('idAdmin');
        $nama = $request->input('nama');
        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');

        if ($idAdmin == null || $nama == null || $umur == null || $jenis_kelamin == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {

            $data = [
                'idAdmin' => $idAdmin,
                'nama' => $nama,
                'umur' => $umur,
                'jenis_kelamin' => $jenis_kelamin,
            ];

            $this->Admin->newAdmin($data);
            return response()->json([
                'success' => 'true',
                'data' => $data,
              ], 201);
        }
    }

    public function updateAdmin($idAdmin, Request $request) {
        $idAdmin = $request->input('idAdmin');
        $nama = $request->input('nama');
        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');

        if ($idAdmin == null || $nama == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
                ], 400);
        } else {
                $data = [
                    'idAdmin' => $idAdmin,
                    'nama' => $nama,
                    'umur' => $umur,
                    'jenis_kelamin' => $jenis_kelamin,
                ];
                $this->Admin->where('idAdmin', $idAdmin)->update($data);
                return response()->json([
                    'success' => 'true',
                    'data' => $data,
                ], 200);

        }

    }

    public function removeAdmin($idAdmin) {
        $success = $this->Admin->removeAdmin($idAdmin);
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
