<?php

namespace App\Http\Controllers\Api\V1\Alumni;

use Illuminate\Http\Request;
use App\Models\Alumni\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->question = new Question;
    }

    public function index()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->question->listQuestion(),
        ], 200);
    }

    public function findQuestion($id_question)
    {
       return response()->json([
        'success' => 'true',
        'data' => $this->question->findbyQuestion($id_question),
        ], 200);
    }

    public function newQuestion(Request $request) {
        $tahun_kelulusan = $request->input('tahun_kelulusan');
        $pertanyaan = $request->input('pertanyaan');
        $jawabanA = $request->input('jawabanA');
        $jawabanB = $request->input('jawabanB');
        $jawabanC = $request->input('jawabanC');
        $jawabanD = $request->input('jawabanD');
        $jawabanE = $request->input('jawabanE');

        if ( $tahun_kelulusan == null || $pertanyaan == null || $jawabanA == null || $jawabanB == null || $jawabanC == null || $jawabanD == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
            ], 400);
        } else {

            $data = [
                'tahun_kelulusan' => $tahun_kelulusan,
                'pertanyaan' => $pertanyaan,
                'jawabanA' => $jawabanA,
                'jawabanB' => $jawabanB,
                'jawabanC' => $jawabanC,
                'jawabanD' => $jawabanD,
                'jawabanE' => $jawabanE,
            ];

            $this->question->newQuestion($data);
            return response()->json([
                'success' => 'true',
                'data' => $data,
              ], 201);
        }
    }

    public function updateQuestion($id_question, Request $request) {
        $id_question = $request->input('id_question');
        $tahun_kelulusan = $request->input('tahun_kelulusan');
        $pertanyaan = $request->input('pertanyaan');
        $jawabanA = $request->input('jawabanA');
        $jawabanB = $request->input('jawabanB');
        $jawabanC = $request->input('jawabanC');
        $jawabanD = $request->input('jawabanD');
        $jawabanE = $request->input('jawabanE');

        if ($id_question == null || $tahun_kelulusan == null) {
            return response()->json([
                'success' => 'false',
                'message' => 'One of the required attributes were empty',
                ], 400);
        } else {
                $data = [
                    'id_question' => $id_question,
                    'tahun_kelulusan' => $tahun_kelulusan,
                    'pertanyaan' => $pertanyaan,
                    'jawabanA' => $jawabanA,
                    'jawabanB' => $jawabanB,
                    'jawabanC' => $jawabanC,
                    'jawabanD' => $jawabanD,
                    'jawabanE' => $jawabanE,

                ];
                $this->question->where('id_question', $id_question)->update($data);
                return response()->json([
                    'success' => 'true',
                    'data' => $data,
                ], 200);

        }

    }

    public function removeQuestion($id_question) {
        $success = $this->question->removeQuestion($id_question);
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
