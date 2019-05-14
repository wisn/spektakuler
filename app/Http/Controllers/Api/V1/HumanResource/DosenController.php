<?php


// Dosen Controller
namespace App\Http\Controllers\Api\V1\HumanResource;

use Illuminate\Http\Request;
use App\Models\HumanResource\Dosen;

/**
 *
 */
class DosenController extends Controller
{

  public function __construct()
  {
    // code...
    $this->dosen= new Dosen;
  }

  public function index()
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->dosen->listDosen(),
    ],200);
    
  }

  public function findDosen($nip_dosen){
    return response()->json([
      'success' =>'true',
      'data'=> $this->dosen->findbyNIP($nip_dosen),
    ], 200);
  }
  public function findDosenFak($id_fakultas){
    return response()->json([
      'success' =>'true',
      'data'=> $this->dosen->findbyFakultas($id_fakultas),
    ], 200);
  }

  public function newDosen(Request $request){
    $nip_dosen = $request->input('nip_dosen');
    $kodedosen = $request->input('kodedosen');
    $nama = $request->input('nama');
    $alamat =$request->input('alamat');
    $ttl = $request->input('ttl');
    $nohp = $request->input('nohp');
    $gaji =$request->input('gaji');
    $id_fakultas = $request->input('id_fakultas');

    if ($nip_dosen == null || $kodedosen == null ){
      return response()->json([
        'success' =>'false',
        'message' => 'One of the required attributes were empty',
      ], 400);
    }else{
      $data = [
        'nip_dosen' => $nip_dosen,
        'kodedosen' => $kodedosen,
        'nama' => $nama,
        'alamat' => $alamat,
        'ttl' => $ttl,
        'nohp' => $nohp,
        'gaji' => $gaji,
        'id_fakultas' => $id_fakultas,
      ];

      $this->dosen->newDosen($data);
      return response()->json([
        'success' =>'true',
        'data' =>$data,
      ],201);
    }
  }

  public function updateDosen($nip_dosen, Request $request){
    $dosen = $this->dosen->where('nip_dosen', $nip_dosen)->limit(1)->get();
    $isExists = count($dosen) == 1;

    if ($isExists) {
      $dosen = $dosen[0];

      $kodedosen = $request->input('kodedosen') ?: $dosen['kodedosen'];
      $nama = $request->input('nama') ?: $dosen['nama'];
      $alamat =$request->input('alamat') ?: $dosen['alamat'];
      $ttl = $request->input('ttl') ?: $dosen['ttl'];
      $nohp = $request->input('nohp') ?: $dosen['nohp'];
      $gaji =$request->input('gaji') ?: $dosen['gaji'];
      $id_fakultas = $request->input('id_fakultas') ?: $dosen['id_fakultas'];

      if ($nip_dosen == null || $kodedosen == null){
        return response()->json([
          'success' =>'false',
          'message' => 'One of the required attributes were empty',
        ], 400);
      }else{
        $data = [
          'nip_dosen' => $nip_dosen,
          'kodedosen' => $kodedosen,
          'nama' => $nama,
          'alamat' => $alamat,
          'ttl' => $ttl,
          'nohp' => $nohp,
          'gaji' => $gaji,
          'id_fakultas' => $id_fakultas,
        ];
        $this->dosen->where('nip_dosen', $nip_dosen)->update($data);
        return response()->json([
          'success'=>true,
          'data'=>$data,
        ], 200);
      }
    }
  }

  public function removeDosen($nip_dosen) {
        $success = $this->dosen->removeDosen($nip_dosen);
        if ($success) {
            return response()->json([
              'success' => 'true',
            ], 200);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Failed removing record',
            ], 500);
        }
     

    }
}


 ?>
