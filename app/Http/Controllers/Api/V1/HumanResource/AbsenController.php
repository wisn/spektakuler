<?php


// Fakultas Controller
namespace App\Http\Controllers\Api\V1\HumanResource;

use Illuminate\Http\Request;
use App\Models\HumanResource\Absen;
/**
 *
 */
class AbsenController extends Controller
{

  public function __construct()
  {
    // code...
    $this->absen= new Absen;
  }

  public function index()
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->absen->listAbsen(),
    ],200);
  }
  public function newAbsen(Request $request)
  {
    $nip = $request->input('nip');
    $id_fakultas = $request->input('id_fakultas');
    $status = $request->input('status');
    if ($nip == null) {
      return response()->json([
        'success' =>'false',
        'message' => 'One of the required attributes were empty',
      ], 400);
    }else{
      $data = [
        'nip' => $nip,
        'id_fakultas' => $id_fakultas,
        'status' => $status,
      ];
      $this->absen->newAbsen($data);
      return response()->json([
        'success' =>'true',
        'data' =>$data,
      ],201);      
    }
  }
  public function fetchAbsen($id_fakultas)
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->absen->fetchAbsenbyAdmin($id_fakultas),
    ],200);
  }
  public function updateAbsen($nip, Request $request)
  {
      $absen = $this->absen->where('nip', $nip)->limit(1)->get();
      $isExists = count($absen) == 1;
      if ($isExists) {
        $absen = $absen[0];

        $nip = $request->input('nip') ?: $absen['nip'];
        $id_fakultas = $request->input('id_fakultas') ?: $absen['id_fakultas'];
        $status = $request->input('status') ?: $absen['status'];

        $data = [
          'nip' => $nip,
          'id_fakultas' => $id_fakultas,
          'status' => $status,
        ];
        $this->absen->where('nip', $nip)->update($data); 
        return response()->json([
          'success'=>true,
          'data'=>$data,
        ], 200);               
      }
  }
}


 ?>
