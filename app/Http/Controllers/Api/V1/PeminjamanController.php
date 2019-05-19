<?php
namespace App\Http\Controllers\Api\V1\Logistik;

use Illuminate\Http\Request;
use App\Models\Logistik\Peminjaman;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->peminjaman = new Peminjaman;
    }
    // public function list()
    // {
    //     return response()->json([
    //         'success' => 'true',
    //         'data' => $this->peminjaman->list(),
    //     ], 200);
    // }
    public function get(Request $request){
        $nim = $this->get('nim');

        if ($nim === null) {
            $pinjam = $this->pm->getPeminjaman();
        } else {
            $pinjam = $this->pm->getPeminjaman($nim);
        }

        if ($pinjam) {
            $return -> response()->json([
                'status' => true,
                'data' => $pinjam
            ], 200);
        } else {
            $return -> response()->json([
                'status' => false,
                'message' => 'kode not found'
            ], 404);
        }
    }
    public function ambil_get()
    {
        $nim = $this->get('nim');
        $pinjam = $this->pm->getPeminjamannip($nip);

        if ($pinjam){
            $return -> response()->json([
                'status' => true,
                'data' => $pinjam,
            ],200);
        }
    }

    public function post(Request $request) {
        $nim = $request->post('nama');
        $tgl_transaksi = $request->post('transaksi');
        $kode_logistik = $request->post('kode');
        $status = $request->post('status');
        $kegiatan = $request->post('kegiatan');
        $tgl_pinjam = $request->post('pinjam');
        $tgl_pengembalian = $request->post('balik');

        if ($createlogistik($request) > 0){
            $return -> response()->json([
                'status' => true,
                'massage' => 'New Logistik has been created.'
            ],201);
        } else {
            $return -> response()->json([
                'status' => false,
                'massage' => 'Failed to created new data'
            ],404);
        }
    }
    public function put($kode, Request $request) {
        $no = $this->peminjaman->put();

        $nim = $request->post('nama');
        $tgl_transaksi = $request->post('transaksi');
        $kode_logistik = $request->post('kode');
        $status = $request->post('status');
        $kegiatan = $request->post('kegiatan');
        $tgl_pinjam = $request->post('pinjam');
        $tgl_pengembalian = $request->post('balik');

        if ($updatelogistik($kode,$request) > 0){
            $return -> response()->json([
                'status' => true,
                'massage' => 'New Logistik has been created.'
            ],201);
        } else {
            $return -> response()->json([
                'status' => false,
                'massage' => 'Failed to created new data'
            ],404);
        }
    } 
}   