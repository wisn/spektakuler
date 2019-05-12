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
  public function newCuti(Request $request)
  {
    $jeniscuti = $request->input('jeniscuti');
    $rentangtanggal = $request->input('rentangtanggal');
    $nip_dosen = $request->input('nip_dosen');
    $nip_staff = $request->input('nip_staff');
    if ($nip_dosen == null) {
      return response()->json([
        'success' =>'false',
        'message' => 'One of the required attributes were empty',
      ], 400);      
    }else{
      $data = [
        'jeniscuti' => $jeniscuti,
        'rentangtanggal' => $rentangtanggal,
        'status' => 'not approved',
        'nip_dosen' => $nip_dosen,
        'nip_staff' => $nip_staff,
      ];
      $this->cuti->newCuti($data);
      return response()->json([
        'success' =>'true',
        'data' =>$data,
      ],201);
    }
  }
    
  
}


 ?>
