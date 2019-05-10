<?php


// Staff Controller
namespace App\Http\Controllers\Api\V1\HumanResource;

use Illuminate\Http\Request;
use App\Models\HumanResource\Staff;
/**
 *
 */
class StaffController extends Controller
{

  public function __construct()
  {
    // code...
    $this->staff= new Staff;
  }

  public function index()
  {
    return response()->json([
      'success' =>'true',
      'data'=> $this->staff->listStaff(),
    ],200);
  }

  public function findStaff($nip_staff){
    return response()->json([
      'success' =>'true',
      'data'=> $this->staff->findbyNIP($nip_staff),
    ], 200);
  }

  public function newStaff(Request $request){
    $nip_staff = $request->input('nip_staff');
    $jenis_staff = $request->input('jenis_staff');
    $nama = $request->input('nama');
    $alamat =$request->input('alamat');
    $ttl = $request->input('ttl');
    $nohp = $request->input('nohp');
    $gaji =$request->input('gaji');
    $id_fakultas = $request->input('id_fakultas');

    if ($nip_staff == null || $jenis_staff == null ){
      return response()->json([
        'success' =>'false',
        'message' => 'One of the required attributes were empty',
      ], 400);
    }else{
      $data = [
        'nip_staff' => $nip_staff,
        'jenis_staff' => $jenis_staff,
        'nama' => $nama,
        'alamat' => $alamat,
        'ttl' => $ttl,
        'nohp' => $nohp,
        'gaji' => $gaji,
        'id_fakultas' => $id_fakultas,
      ];

      $this->staff->newStaff($data);
      return response()->json([
        'success' =>'true',
        'data' =>$data,
      ],201);
    }
  }

  public function updateStaff($nip_staff, Request $request){
    $staff = $this->staff->where('nip_staff', $nip_staff)->limit(1)->get();
    $isExists = count($staff) == 1;

    if ($isExists) {
      $staff = $staff[0];

      $jenis_staff = $request->input('jenis_staff') ?: $staff['jenis_staff'];
      $nama = $request->input('nama') ?: $staff['nama'];
      $alamat =$request->input('alamat') ?: $staff['alamat'];
      $ttl = $request->input('ttl') ?: $staff['ttl'];
      $nohp = $request->input('nohp') ?: $staff['nohp'];
      $gaji =$request->input('gaji') ?: $staff['gaji'];
      $id_fakultas = $request->input('id_fakultas') ?: $staff['id_fakultas'];

      if ($nip_staff == null || $jenis_staff == null){
        return response()->json([
          'success' =>'false',
          'message' => 'One of the required attributes were empty',
        ], 400);
      }else{
        $data = [
          'nip_staff' => $nip_staff,
          'jenis_staff' => $jenis_staff,
          'nama' => $nama,
          'alamat' => $alamat,
          'ttl' => $ttl,
          'nohp' => $nohp,
          'gaji' => $gaji,
          'id_fakultas' => $id_fakultas,
        ];
        $this->staff->where('nip_staff', $nip_staff)->update($data);
        return response()->json([
          'success'=>true,
          'data'=>$data,
        ], 200);
      }
    }
  }

  public function removeStaff($nip_staff) {
        $success = $this->staff->removeStaff($nip_staff);
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
