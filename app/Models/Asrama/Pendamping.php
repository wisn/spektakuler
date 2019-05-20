<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

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
