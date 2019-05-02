<?php

namespace App\Http\Controllers\Api\V1\Asrama;

use App\Models\Asrama\Gedung;

class GedungController extends Controller
{
    public function __construct()
    {
        $this->gedung = new Gedung;
    }

    public function list()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->gedung->list(),
        ], 200);
    }

    public function listPutra()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->gedung->listPutra(),
        ], 200);
    }

    public function listPutri()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->gedung->listPutri(),
        ], 200);
    }
}
