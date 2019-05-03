<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Paper;

class PaperController extends Controller
{
    public function __construct()
    {
        $this->paper = new Paper;
    }

    public function list()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->paper->list()
        ], 200);
    }

    public function listByStatus($status)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->paper->listByStatus($status)
        ], 200);
    }

    public function listByEvent($event)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->paper->listByEvent($event)
        ], 200);
    }
}
