<?php

namespace App\Http\Controllers\Api\V1\Alumni;

use Illuminate\Http\Request;
use App\Models\Alumni\Dekan;

class DekanController extends Controller
{
    public function __construct()
    {
        $this->dekan = new Dekan;
    }

    public function index()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->dekan->listDekan(),
        ], 200);
    }

    public function findDekan($idDekan)
    {
       return response()->json([
        'success' => 'true',
        'data' => $this->dekan->findbyDekan($idDekan),
        ], 200);
    }

    public function newDekan(Request $request) {
        $nama = $request->input('nama');
        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');

        if ( $nama == null || $umur == null || $jenis_kelamin == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {

            $data = [
                'nama' => $nama,
                'umur' => $umur,
                'jenis_kelamin' => $jenis_kelamin,
            ];

            $this->dekan->newDekan($data);
            return response()->json([
                'success' => 'true',
                'data' => $data,
              ], 201);
        }
    }

    public function updateDekan($idDekan, Request $request) {
        $idDekan = $request->input('idDekan');
        $nama = $request->input('nama');
        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');

        if ($idDekan == null || $nama == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
                ], 400);
        } else {
                $data = [
                    'idDekan' => $idDekan,
                    'nama' => $nama,
                    'umur' => $umur,
                    'jenis_kelamin' => $jenis_kelamin,
                ];
                $this->dekan->where('idDekan', $idDekan)->update($data);
                return response()->json([
                    'success' => 'true',
                    'data' => $data,
                ], 200);

        }

    }

    public function removeDekan($idDekan) {
        $success = $this->dekan->removeDekan($idDekan);
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
