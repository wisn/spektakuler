<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Evaluator;
use Illuminate\Http\Request;

class EvaluatorController extends Controller
{
    public function __construct()
    {
        $this->evaluator = new Evaluator;
    }

    public function get($username)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->evaluator->get($username)
        ], 200);
    }

    public function add(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $name = $request->input('name');

        if ($username == NULL || $email == NULL || $password == NULL || $name == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attrbiute(s)'
            ], 400);
        }
        
        if ($this->evaluator->get($username)) {
            return response()->json([
                'success' => 'false',
                'message' => 'Username is taken'
            ], 400);
        }

        else {
            if ($this->evaluator->add($username, $email, $password, $name)) {
                return response()->json([
                    'success' => 'true',
                ], 201);
            }
            else {
                return response()->json([
                    'success' => 'false',
                    'message' => 'Failed to add evaluator'
                ], 500);
            }
        }
    }

    public function edit($username, Request $request)
    {    
        $evaluator = $this->evaluator->get($username);

        $email = $request->input('email');
        $name = $request->input('name');
        
        if (!$evaluator) {
            return response()->json([
                'success' => 'false',
                'message' => 'Evaluator can\'t be found'
            ], 404);
        }
        
        if ($this->evaluator->edit($evaluator, $email, $name)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to edit evaluator'
            ], 500);
        }
    }

    public function remove($username)
    {
        $evaluator = $this->evaluator->get($username);
        
        if (!$evaluator) {
            return response()->json([
                'success' => 'false',
                'message' => 'Evaluator can\'t be found'
            ], 404);
        }
        
        if ($this->evaluator->remove($evaluator)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to remove evaluator'
            ], 500);
        }
    }
}
