<?php
namespace App\Http\Controllers\Api\V1\Logistik;

use Illuminate\Http\Request;
use App\Models\Logistik\Logistikk;


class Logistik extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logistik_model', 'lgs');
    }

    public function get(Request $request){
        $kode = $this->get('kode');
        if ($kode === null){
            $logistik = $this->lgs->getLogistik();
        } else{
            $logistik = $this->lgs->getLogistik($kode);
        }
        
        if ($logistik){
            $return -> response()->json([
                'status' => true,
                'data' => $logistik
            ],200);
        } else {
            $return -> response()->json([
                'status' => false,
                'message' => 'kode not found'
            ], 404);
        } 
    }

    public function delete(Request $request)
    {
        $kode = $this->delete('kode');

        if ($kode === null){
            $return -> response()->json([
                'status' => false,
                'message' => 'provide a kode'
            ],202);
        } else {
            if ($this->lgs->deleteLogistik($kode) > 0) {
                $return -> response()->json([
                    'status' => true,
                    'kode' => $kode,
                    'message' => 'Deleted.'
                ], 200);
            } else {
                $return -> response()->json([
                    'status' => false,
                    'message' => 'kode not found'
                ], 404);
            }
        }
    }

    public function post(Request $request)
    {
        $data = [
            'kode_logistik' => $this->post('kode'),
            'nama' => $this->post('nama'),
            'status' => $this->post('status'),
            'tipe' => $this->post('tipe'),
            'foto' => $this->post('foto')
        ];

        if ($this->lgs->createLogistik($data) > 0){
            $return -> response()->json([
                'status' => true,
                'message' => 'New Logistik has been created.'
            ],200);
        } else {
            $return -> response()->json([
                'status' => false,
                'message' => 'Failed to create new data'
            ], 404);
        }
    }

    public function put(Request $request)
    {
        $kode = $this->put('kode');
        $data = [
            'nama' => $this->put('nama'),
            'status' => $this->put('status'),
            'tipe' => $this->put('tipe'),
            'foto' => $this->put('foto')
        ];

        if ($this->lgs->updateLogistik($data, $kode) > 0){
            $return -> response()->json([
                'status' => true,
                'message' => 'data Logistik has been updated.'
            ],200);
        } else {
            $return -> response()->json([
                'status' => false,
                'message' => 'Failed to update data'
            ],404);
        }
    }
}