<?php


// Dosen Controller
namespace App\Http\Controllers\Api\V1\HumanResource;

use Illuminate\Http\Request;
use App\Models\HumanResource\Cuti;
/**
 *
 */
class CutiController extends Controller
{

  public function __construct()
  {
    // code...
    $this->cuti= new Cuti;
  }

  public function index()
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->cuti->listCuti(),
    ],200);
  }

}


 ?>
