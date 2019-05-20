<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penghuni extends Model
{
    protected $table = 'asrama_penghuni';

    protected $fillable = [
        'id_mahasiswa',
        'id_kamar',
    ];

    public function list()
    {
        return $this->all();
    }

    public function listMahasiswa($id_mahasiswa)
    {
        $penghuni = $this->where('id_mahasiswa', $id_mahasiswa)->limit(1)->get();

        if (count($penghuni) == 0) return [];

        $id_kamar = $penghuni[0]->id_kamar;
        $penghuni = $this->join('sm_mahasiswa', function ($join) use ($id_kamar) {
            $join->on('asrama_penghuni.id_mahasiswa', '=', 'sm_mahasiswa.id_mahasiswa')
                ->where('id_kamar', $id_kamar);
        })->get();

        return $penghuni;
    }

    public function detail($id_mahasiswa)
    {
        $penghuni = $this->where('id_mahasiswa', $id_mahasiswa)->limit(1)->get();

        if (count($penghuni) == 0) return [];

        $id_kamar = $penghuni[0]->id_kamar;
        $kamar = DB::table('asrama_kamar')->join('asrama_gedung', function ($join) use ($id_kamar) {
            $join->on('asrama_kamar.id_gedung', '=', 'asrama_gedung.id_gedung')
                ->where('asrama_kamar.id_kamar', $id_kamar);
        })->get();

        if (count($kamar) == 0) return [];

        $mahasiswa = DB::table('sm_mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->get();

        if (count($kamar) == 0) return [];

        return ['kamar' => $kamar[0], 'mahasiswa' => $mahasiswa[0]];
    }

    public function findByIds($id_mahasiswa, $id_kamar)
    {
        return $this->where([['id_mahasiswa', $id_mahasiswa], ['id_kamar', $id_kamar]])->limit(1)->get();
    }

    public function findKamar($id_mahasiswa, $id_kamar)
    {
        return $this->join('asrama_kamar', function ($join) use ($id_mahasiswa, $id_kamar) {
            $join->on('asrama_penghuni.id_kamar', '=', 'asrama_kamar.id_kamar')
                ->where([
                    ['asrama_penghuni.id_mahasiswa', $id_mahasiswa],
                    ['asrama_penghuni.id_kamar', $id_kamar],
                  ]);
        })->get();
    }

    public function new($data)
    {
        $this->id_mahasiswa = $data['id_mahasiswa'];
        $this->id_kamar = $data['id_kamar'];

        return $this->save();
    }

    public function remove($id_mahasiswa)
    {
        $sr = $this->where('id_mahasiswa', $id_mahasiswa)->limit(1)->get();
        $isExists = count($sr) == 1;

        if ($isExists) {
            return $this->where('id_mahasiswa', $id_mahasiswa)->delete();
        }

        return false;
    }
}
