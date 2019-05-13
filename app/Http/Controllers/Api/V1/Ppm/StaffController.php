<?php

namespace App\Http\Controllers\Api\V1\Ppm;

use App\Models\Ppm\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->staff = new Staff;
    }

    public function get($username)
    {
        return response()->json([
            'success' => 'true',
            'data' => $this->staff->get($username)
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
                'message' => 'Empty attribute(s)'
            ], 400);
        }
        
        if ($this->staff->get($username)) {
            return response()->json([
                'success' => 'false',
                'message' => 'Username is taken'
            ], 400);
        }

        else {
            if ($this->staff->add($username, $email, $password, $name)) {
                return response()->json([
                    'success' => 'true',
                ], 201);
            }
            else {
                return response()->json([
                    'success' => 'false',
                    'message' => 'Failed to add staff'
                ], 500);
            }
        }
    }

    public function edit($username, Request $request)
    {    
        $staff = $this->staff->get($username);

        if(!$staff) {
            return response()->json([
                'success' => 'false',
                'message' => 'Staff can\'t be found'
            ], 404);
        }

        $email = $request->input('email');
        $name = $request->input('name');

        if ($email == NULL || $name == NULL) {
            return response()->json([
                'success' => 'false',
                'message' => 'Empty attribute(s)'
            ], 400);
        }

        if ($this->staff->edit($staff, $email, $name)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to edit staff'
            ], 500);
        }
    }

    public function remove($username)
    {
        $staff = $this->staff->get($username);
        
        if (!$staff) {
            return response()->json([
                'success' => 'false',
                'message' => 'Staff can\'t be found'
            ], 404);
        }
        
        if ($this->staff->remove($staff)) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
        else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed to remove staff'
            ], 500);
        }
    }
}
