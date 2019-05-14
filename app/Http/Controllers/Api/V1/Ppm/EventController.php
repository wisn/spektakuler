<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Event;
use App\Models\Ppm\Paper;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event;
        $this->paper = new Paper;
    }

    public function list()
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->event->list()
        ], 200);
    }

    public function get($id_event)
    {
        $event = $this->event->get($id_event);
        if (!$event) {
            return response()->json([
                'success' => 'false',
                'message' => 'Event can\'t be found'
            ], 404);
        }
        else {
            $event->papers = $this->paper->listByEvent($id_event);
            return response()->json([
                'success' => 'true',
                'data' => $event
            ], 200);
        }
    }

    public function add(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($name == NULL || $description == NULL || $start_date == NULL || $end_date == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }

        if ($this->event->add($name, $description, $start_date, $end_date)) {
            return response()->json([
                'success' => 'true',
            ], 201);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to add event'
            ], 500);
        }
    }

    public function edit($id_event, Request $request)
    {    
        $event = $this->event->get($id_event);

        if (!$event) {
            return response()->json([
                'success' => 'false',
                'message' => 'Event can\'t be found'
            ], 404);
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($name == NULL || $description == NULL || $start_date == NULL || $end_date == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }
        
        if ($this->event->edit($event, $name, $description, $start_date, $end_date)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to edit event'
            ], 500);
        }
    }

    public function remove($id_event)
    {
        $event = $this->event->get($id_event);

        if (!$event) {
            return response()->json([
                'success' => 'false',
                'message' => 'Event can\'t be found'
            ], 404);
        }
        
        if ($this->event->remove($event)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to remove event'
            ], 500);
        }
    }
}
