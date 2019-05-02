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
        ]);
    }
}
