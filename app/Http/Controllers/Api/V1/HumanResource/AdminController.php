<?php


// Dosen Controller
namespace App\Http\Controllers\Api\V1\HumanResource;

use Illuminate\Http\Request;
use App\Models\HumanResource\Admin;
use App\Models\HumanResource\Dosen;
use App\Models\HumanResource\Staff;
use App\Http\Controllers\Api\V1\HumanResource\DosenController;
use App\Http\Controllers\Api\V1\HumanResource\StaffController;

/**
 *
 */
class AdminController extends Controller
{
  protected $dosenController;
  protected $staffController;
  public function __construct(DosenController $dosenController, StaffController $staffController)
  {
    $this->dosenController = $dosenController;
    $this->staffController = $staffController;
    // code...
    $this->admin= new Admin;
    $this->dosen= new Dosen;
    $this->staff= new Staff;
    
  }
  public function findAdmin($nip_admin){
    return response()->json([
      'success' =>'true',
      'data'=> $this->admin->findbyNIP($nip_admin),
    ], 200);
  }
  public function ShowDosen()
  {
    // $Dosen = $this->dosenController->index();
    // return view("showdosen",compact('Dosen'));

    // $data = $this->dosenController->index();
    // return view('showdosen')->with($data);
    return $this->dosenController->index();

  }
  public function ShowStaff()
  {
    return $this->staffController->index(); 
    # code...   
  }
  public function findDosen($nip_dosen)
  {
    return $this->dosenController->findDosen($nip_dosen);
  }
  public function findDosenbyFakultas($id_fakultas)
  {
    return $this->dosenController->findDosenFak($id_fakultas);
  }
  public function findStaff($nip_staff)
  {
    return $this->staffController->findStaff($nip_staff);
  }
  public function newDosen(Request $request)
  {
    return $this->dosenController->newDosen($request);
  } 
  public function newStaff(Request $request)
  {
    return $this->staffController->newStaff($request);
  }     
}


 ?>
