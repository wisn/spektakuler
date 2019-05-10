<?php


// Fakultas Controller
namespace App\Http\Controllers\Api\V1\HumanResource;

use Illuminate\Http\Request;
use App\Models\HumanResource\Fakultas;
/**
 *
 */
class FakultasController extends Controller
{

  public function __construct()
  {
    // code...
    $this->fakultas= new Fakultas;
  }

  public function index()
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->fakultas->listFakultas(),
    ],200);
  }
}


 ?>
