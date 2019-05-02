<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event;
    }

    public function list()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->event->list()
        ], 200);
    }
}
