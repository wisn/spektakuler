<?php

namespace App\Http\Controllers\Api\V1\HumanResource;

use Illuminate\Http\Request;
use App\Models\HumanResource\Staff;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->staff = new Staff;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->staff->list(),
        ], 200);
    }

    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username == null || $password == null) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu atribut yang diperlukan kosong',
            ], 400);
        } else {
          $staff = $this->staff->findByUsername($username);
          $isExists = count($staff) == 1;

          if ($isExists && $staff[0]['password'] == $password) {
              return response()->json([
                  'success' => true,
              ], 200);
          } else {
              return response()->json([
                  'success' => false,
                  'message' => 'Username atau password salah',
              ], 404);
          }
        }
    }
}
