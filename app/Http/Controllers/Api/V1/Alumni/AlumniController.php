<?php

namespace App\Http\Controllers\Api\V1\Alumni;

use Illuminate\Http\Request;
use App\Models\Alumni\Alumni;

class AlumniController extends Controller
{
    public function __construct()
    {
        $this->alumni = new Alumni;
    }

    public function index()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->alumni->listAlumni(),
        ], 200);
    }

    public function findAlumni($NIM)
    {
       return response()->json([
        'success' => 'true',
        'data' => $this->alumni->findbyNIM($NIM),
        ], 200);
    }

    public function newAlumni(Request $request) {
        $NIM = $request->input('NIM');
        $tahun_kelulusan = $request->input('tahun_kelulusan');

        if ($NIM == null || $tahun_kelulusan == null ) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {

            $data = [
                'NIM' => $NIM,
                'tahun_kelulusan' => $tahun_kelulusan,
            ];

            $this->alumni->newAlumni($data);
            return response()->json([
                'success' => 'true',
                'data' => $data,
              ], 201);
        }
    }

    public function updateAlumni($NIM, Request $request) {
        $NIM = $request->input('NIM');
        $tahun_kelulusan = $request->input('tahun_kelulusan');

        if ($NIM == null || $tahun_kelulusan == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
                ], 400);
        } else {
                $data = [
                    'NIM' => $NIM,
                    'tahun_kelulusan' => $tahun_kelulusan,
                    ];
                $this->alumni->where('NIM', $NIM)->update($data);
                return response()->json([
                    'success' => 'true',
                    'data' => $data,
                ], 200);

        }

    }

    public function removeAlumni($NIM) {
        $success = $this->alumni->removeAlumni($NIM);
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
