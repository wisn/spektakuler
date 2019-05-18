<?php

namespace App\Http\Controllers\Api\V1\Alumni;

use Illuminate\Http\Request;
use App\Models\Alumni\Jawaban;

class JawabanController extends Controller
{
    public function __construct()
    {
        $this->jawaban = new Jawaban;
    }

    public function index()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->jawaban->listJawaban(),
        ], 200);
    }

    public function findJawaban($id_jawaban)
    {
       return response()->json([
        'success' => 'true',
        'data' => $this->jawaban->findbyJawaban($id_jawaban),
        ], 200);
    }

    public function newJawaban(Request $request) {
        $id_jawaban = $request->input('id_jawaban');
        $NIM = $request->input('NIM');
        $id_question = $request->input('id_question');
        $jawaban = $request->input('jawaban');

        if ($id_jawaban == null || $NIM == null || $id_question == null || $jawaban == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {

            $data = [
                'id_jawaban' => $id_jawaban,
                'NIM' => $NIM,
                'id_question' => $id_question,
                'jawaban' => $jawaban,
            ];

            $this->jawaban->newJawaban($data);
            return response()->json([
                'success' => 'true',
                'data' => $data,
              ], 201);
        }
    }

    public function updateJawaban($id_jawaban, Request $request) {
        $id_jawaban = $request->input('id_jawaban');
        $NIM = $request->input('NIM');
        $id_question = $request->input('id_question');
        $jawaban = $request->input('jawaban');

        if ($id_jawaban == null || $NIM == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
                ], 400);
        } else {
                $data = [
                    'id_jawaban' => $id_jawaban,
                    'NIM' => $NIM,
                    'id_question' => $id_question,
                    'jawaban' => $jawaban,
                ];
                $this->jawaban->where('id_jawaban', $id_jawaban)->update($data);
                return response()->json([
                    'success' => 'true',
                    'data' => $data,
                ], 200);

        }

    }

    public function removeJawaban($id_jawaban) {
        $success = $this->jawaban->removeJawaban($id_jawaban);
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
