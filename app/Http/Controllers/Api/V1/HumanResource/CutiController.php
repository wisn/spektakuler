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
  public function fetchCuti($id_fakultas)
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->cuti->fetchCutibyAdmin($id_fakultas),
    ],200);
  }
  public function fetchCutiNIP($nip)
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->cuti->fetchCutibyNIP($nip),
    ],200);
  }  
  public function newCuti(Request $request)
  {
    $jeniscuti = $request->input('jeniscuti');
    $rentangtanggal = $request->input('rentangtanggal');
    $status = $request->input('status');
    $keterangan = $request->input('keterangan');
    $nip = $request->input('nip');
    $id_fakultas = $request->input('id_fakultas');
    if ($rentangtanggal == null) {
      return response()->json([
        'success' =>'false',
        'message' => 'One of the required attributes were empty',
      ], 400);      
    }else{
      $data = [
        'jeniscuti' => $jeniscuti,
        'rentangtanggal' => $rentangtanggal,
        'status' => $status,
        'keterangan' => $keterangan,
        'nip' => $nip,
        'id_fakultas' => $id_fakultas,
      ];
      $this->cuti->newCuti($data);
      return response()->json([
        'success' =>'true',
        'data' =>$data,
      ],201);
    }
  }
  public function updateCuti($nip, Request $request)
  {
      $cuti = $this->cuti->where('nip', $nip)->limit(1)->get();
      $isExists = count($cuti) == 1;
      if ($isExists) {
        $cuti = $cuti[0];

        $jeniscuti = $request->input('jeniscuti') ?: $cuti['jeniscuti'];
        $rentangtanggal = $request->input('rentangtanggal') ?: $cuti['rentangtanggal'];
        $status = $request->input('status') ?: $cuti['status'];
        $keterangan = $request->input('keterangan') ?: $cuti['keterangan'];
        $nip = $request->input('nip') ?: $cuti['nip'];
        $id_fakultas = $request->input('id_fakultas') ?: $cuti['id_fakultas'];

        $data = [
          'jeniscuti' => $jeniscuti,
          'rentangtanggal' => $rentangtanggal,
          'status' => $status,
          'keterangan' => $keterangan,
          'nip' => $nip,
          'id_fakultas' => $id_fakultas,
        ];
        $this->cuti->where('nip', $nip)->update($data); 
        return response()->json([
          'success'=>true,
          'data'=>$data,
        ], 200);               
      }
  }  

    
  
}


 ?>
