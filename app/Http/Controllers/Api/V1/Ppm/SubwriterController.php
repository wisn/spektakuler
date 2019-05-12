<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Subwriter;
use App\Models\Ppm\Paper;
use Illuminate\Http\Request;

class SubwriterController extends Controller
{
    public function __construct()
    {
        $this->subwriter = new Subwriter;
        $this->paper = new Paper;
    }

    public function listByPaper($id_paper)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->subwriter->listByPaper($id_paper)
        ], 200);
    }

    public function listByMahasiswa($nim_mahasiswa)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->subwriter->listByMahasiswa($nim_mahasiswa)
        ], 200);
    }

    public function add($id_paper, $nim_mahasiswa)
    {
        if (!$this->paper->get($id_paper)) {
            return response()->json([
                'success' => 'false',
                'message' => 'Paper can\'t be found'
            ], 404);
        }

        if ($this->subwriter->add($id_paper, $nim_mahasiswa)) {
            return response()->json([
                'success' => 'true',
            ], 201);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to add subwriter'
            ], 500);
        }
    }

    public function remove($id_paper, $nim_mahasiswa)
    {
        $subwriter = $this->subwriter->get($id_paper, $nim_mahasiswa);

        if (!$subwriter) {
            return response()->json([
                'success' => 'false',
                'message' => 'Subwriter can\'t be found'
            ], 404);
        }
        
        if ($this->subwriter->remove($subwriter)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to remove subwriter'
            ], 500);
        }
    }
}
