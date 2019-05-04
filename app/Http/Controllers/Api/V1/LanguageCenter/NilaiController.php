<?php

namespace App\Http\Controllers\Api\V1\LanguageCenter;

use Illuminate\Http\Request;
use App\Models\LanguageCenter\Nilai;

class NilaiController extends Controller
{
  public function __construct()
  {
      $this->nilai = new Nilai;
  }

  public function getNilai()
  {
      return response()->json($this->nilai->listNilai(), 200);
  }

  public function new(Request $request) {
    $nama = $request->input('nama');
    $tipe_tes = $request->input('tipe_tes');
    $tipe_peserta = $request->input('tipe_peserta');
    $ruangan = $request->input('ruangan');
    $nilai = $request->input('nilai');

    $data = [
      'nama'=>$nama,
      'tipe_tes'=>$tipe_tes,
      'tipe_peserta'=>$tipe_peserta,
      'ruangan'=>$ruangan,
      'nilai'=>$nilai
    ];

    $this->nilai->new($data);

    return response()->json([
        'success' => 'true',
        'data' => $data,
    ], 201);
  }
}
