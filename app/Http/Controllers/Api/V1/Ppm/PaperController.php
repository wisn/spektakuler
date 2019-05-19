<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Paper;
use App\Models\Ppm\Event;
use App\Models\Ppm\Staff;
use App\Models\Ppm\Review;
use App\Models\Ppm\Evaluator;
use App\Models\Ppm\Subwriter;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function __construct()
    {
        $this->paper = new Paper;
        $this->event = new Event;
        $this->staff = new Staff;
        $this->review = new Review;
        $this->evaluator = new Evaluator;
        $this->subwriter = new Subwriter;
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
        $paper = $this->paper->get($id_paper);
        if (!$paper) {
            return response()->json([
                'success' => 'false',
                'message' => 'Paper can\'t be found'
            ], 404);
        }
        else {
            $paper->event = $this->event->get($paper->id_event);

            if ($paper->id_staff) {
                $paper->staff = $this->staff->getById($paper->id_staff);
            }
            
            $paper->reviews = $this->review->listByPaper($id_paper);
            foreach ($paper->reviews as $review) {
                $review->evaluator = $this->evaluator->getById($review->id_evaluator);
            }
            $paper->subwriters = $this->subwriter->listByPaper($id_paper);
            return response()->json([
                'success' => 'true',
                'data' => $paper
            ], 200);
        }
    }

    public function add(Request $request)
    {
        $title = $request->input('title');
        $date = $request->input('date');
        $fund = $request->input('fund');
        $id_event = $request->input('id_event');
        $nip_dosen = $request->input('nip_dosen');
        $nim_mahasiswa = $request->input('nim_mahasiswa');
        $file_path = $request->input('file_path');

        $status = 'pending';

        if ($title == NULL || $date == NULL || $fund == NULL || $id_event == NULL || $nip_dosen == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }
        if ($this->paper->add($title, $date, $fund, $status, $id_event, $nip_dosen, $nim_mahasiswa, $file_path)) {
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

    public function verify($id_paper, $id_staff)
    {
        $paper = $this->paper->get($id_paper);

        if (!$paper) {
            return response()->json([
                'success' => 'false',
                'message' => 'Paper can\'t be found'
            ], 404);
        }

        if ($this->paper->verify($paper, $id_staff)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to verify paper'
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
