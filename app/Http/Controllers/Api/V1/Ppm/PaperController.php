<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Paper;
use Illuminate\Http\Request;

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

    public function listByEvent($id_event)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->paper->listByEvent($id_event)
        ], 200);
    }

    public function get($id_paper)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->paper->get($id_paper)
        ], 200);
    }

    public function add(Request $request)
    {
        $title = $request->input('title');
        $date = $request->input('date');
        $fund = $request->input('fund');
        $id_event = $request->input('id_event');
        $nip_dosen = $request->input('nip_dosen');

        $status = 'pending';

        if ($title == NULL || $date == NULL || $fund == NULL || $id_event == NULL || $nip_dosen == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }

        if ($this->paper->add($title, $date, $fund, $status, $id_event, $nip_dosen)) {
            return response()->json([
                'success' => 'true',
            ], 201);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to add paper'
            ], 500);
        }
    }

    public function edit($id_paper, Request $request)
    {    
        $paper = $this->paper->get($id_paper);

        if (!$paper) {
            return response()->json([
                'success' => 'false',
                'message' => 'Paper can\'t be found'
            ], 404);
        }

        $title = $request->input('title');
        $date = $request->input('date');
        $fund = $request->input('fund');

        if ($title == NULL || $date == NULL || $fund == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }
        
        if ($this->paper->edit($paper, $title, $date, $fund)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to edit paper'
            ], 500);
        }
    }

    public function changeStatus($id_paper, Request $request)
    {
        $paper = $this->paper->get($id_paper);

        if (!$paper) {
            return response()->json([
                'success' => 'false',
                'message' => 'Paper can\'t be found'
            ], 404);
        }

        $status = $request->input('status');

        if ($this->paper->changeStatus($paper, $status)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to change paper status'
            ], 500);
        }
    }

    public function remove($id_paper)
    {
        $paper = $this->paper->get($id_paper);

        if (!$paper) {
            return response()->json([
                'success' => 'false',
                'message' => 'Paper can\'t be found'
            ], 404);
        }
        
        if ($this->paper->remove($paper)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to remove paper'
            ], 500);
        }
    }
}
