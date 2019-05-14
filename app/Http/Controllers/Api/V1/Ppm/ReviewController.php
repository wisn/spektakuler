<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Review;
use App\Models\Ppm\Evaluator;
use App\Models\Ppm\Paper;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->review = new Review;
        $this->evaluator = new Evaluator;
        $this->paper = new Paper;
    }

    public function listByEvaluator($id_evaluator)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->review->listByEvaluator($id_evaluator)
        ], 200);
    }

    public function listByPaper($id_paper)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->review->listByPaper($id_paper)
        ], 200);
    }

    public function get($id_paper, $id_evaluator)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->review->get($id_paper, $id_evaluator)
        ], 200);
    }

    public function add($id_paper, $id_evaluator, Request $request)
    {
        $review_txt = $request->input('review');

        if ($review_txt == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }

        if (!$this->evaluator->getById($id_evaluator) || !$this->paper->get($id_paper)) {
            return response()->json([
                'success' => 'false',
                'message' => 'Evaluator and/or paper can\'t be found'
            ], 404);
        }

        if ($this->review->add($id_paper, $id_evaluator, $review_txt)) {
            return response()->json([
                'success' => 'true',
            ], 201);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to add review'
            ], 500);
        }
    }

    public function edit($id_paper, $id_evaluator, Request $request)
    {    
        $review = $this->review->get($id_paper, $id_evaluator);

        if (!$review) {
            return response()->json([
                'success' => 'false',
                'message' => 'Review can\'t be found'
            ], 404);
        }

        $review_txt = $request->input('review');

        if ($review_txt == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }
        
        if ($this->review->edit($review, $review_txt)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to edit review'
            ], 500);
        }
    }

    public function remove($id_paper, $id_evaluator)
    {
        $review = $this->review->get($id_paper, $id_evaluator);

        if (!$review) {
            return response()->json([
                'success' => 'false',
                'message' => 'Review can\'t be found'
            ], 404);
        }
        
        if ($this->review->remove($review)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to remove review'
            ], 500);
        }
    }
}
