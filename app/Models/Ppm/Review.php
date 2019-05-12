<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'ppm_reviews';

    protected $fillable = [
        'id_evaluator',
        'id_paper',
        'review'
    ];

    public function listByEvaluator($id_evaluator)
    {
        return $this->where('id_evaluator', $id_evaluator)->get();
    }

    public function listByPaper($id_paper)
    {
        return $this->where('id_paper', $id_paper)->get();
    }

    public function get($id_paper, $id_evaluator)
    {
        return $this->where(['id_evaluator' => $id_evaluator, 'id_paper' == $id_paper])->first();
    }
    
    public function add($id_paper, $id_evaluator, $review_txt)
    {
        $review = new Review;
        $review->id_evaluator = $id_evaluator;
        $review->id_paper = $id_paper;
        $review->review = $review_txt;

        return $review->save();
    }

    public function edit(Review $review, $review_txt)
    {
        $review->review = $review_txt;

        return $review->save();
    }

    public function remove(Review $review) 
    {
        return $review->delete();
    }
}