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

}
