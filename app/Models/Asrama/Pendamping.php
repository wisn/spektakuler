<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pendamping extends Model
{
    protected $table = 'asrama_pendamping';

    protected $fillable = [
        'id_sr',
        'id_kamar',
    ];

    public function list()
    {
        return $this->all();
    }

    public function listById($id_sr)
    {
        return $this->join('asrama_kamar', function ($join) use ($id_sr) {
            $join->on('asrama_pendamping.id_kamar', '=', 'asrama_kamar.id_kamar')
                ->where('asrama_pendamping.id_sr', $id_sr);
        })->get();
    }

    public function findByIds($id_sr, $id_kamar)
    {
        return $this->where([['id_sr', $id_sr], ['id_kamar', $id_kamar]])->limit(1)->get();
    }

    public function findByKamarId($id_kamar)
    {
        return $this->where('id_kamar', $id_kamar)->limit(1)->get();
    }

    public function findKamar($id_sr, $id_kamar)
    {
        return $this->join('asrama_kamar', function ($join) use ($id_sr, $id_kamar) {
            $join->on('asrama_pendamping.id_kamar', '=', 'asrama_kamar.id_kamar')
                ->where([
                    ['asrama_pendamping.id_sr', $id_sr],
                    ['asrama_pendamping.id_kamar', $id_kamar],
                ]);
        })->get();
    }

    public function findByIdMahasiswa($id_mahasiswa)
    {
        $penghuni = DB::table('asrama_penghuni')
            ->where('id_mahasiswa', $id_mahasiswa)->get();

        if (count($penghuni) == 0) return [];

        $id_kamar = $penghuni[0]->id_kamar;
        $pendamping = $this->findByKamarId($id_kamar);

        if (count($pendamping) == 0) return [];

        $id_sr = $pendamping[0]->id_sr;
        $sr = DB::table('asrama_sr')->join('sm_mahasiswa', function ($join) use ($id_sr) {
            $join->on('asrama_sr.nim', '=', 'sm_mahasiswa.nim')
                ->where('asrama_sr.id_sr', $id_sr);
        })->get();

        if (count($sr) == 0) return [];

        $id_mahasiswa = $sr[0]->id_mahasiswa;
        $penghuni = DB::table('asrama_penghuni')->where('id_mahasiswa', $id_mahasiswa)->get();

        if (count($penghuni) == 0) return ['kamar' => null, 'sr' => $sr[0]];

        $id_kamar = $penghuni[0]->id_kamar;
        $kamar = DB::table('asrama_kamar')->join('asrama_gedung', function ($join) use ($id_kamar) {
           $join->on('asrama_kamar.id_gedung', '=', 'asrama_gedung.id_gedung')
               ->where('id_kamar', $id_kamar);
        })->get();

        if (count($kamar) == 0) return ['kamar' => null, 'sr' => $sr[0]];

        return ['kamar' => $kamar[0], 'sr' => $sr[0]];
    }

    public function new($data)
    {
        $this->id_sr = $data['id_sr'];
        $this->id_kamar = $data['id_kamar'];

        return $this->save();
    }

    public function remove($id_sr, $id_kamar)
    {
        $sr = $this->where([['id_sr', $id_sr], ['id_kamar', $id_kamar]])->limit(1)->get();
        $isExists = count($sr) == 1;

        if ($isExists) {
            return $this->where([['id_sr', $id_sr], ['id_kamar', $id_kamar]])->delete();
        }

        return false;
    }
}
