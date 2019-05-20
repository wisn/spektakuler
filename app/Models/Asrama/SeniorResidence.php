<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class SeniorResidence extends Model
{
    protected $table = 'asrama_sr';

    protected $fillable = [
        'nim',
        'username',
        'password',
        'id_gedung',
    ];

    public function list()
    {
        return $this->join('sm_mahasiswa', function ($join) {
            $join->on('asrama_sr.nim', '=', 'sm_mahasiswa.nim');
        })->get();
    }

    public function listAssigned()
    {
        return $this->join('sm_mahasiswa', function ($join) {
            $join->on('asrama_sr.nim', '=', 'sm_mahasiswa.nim')
                ->where('asrama_sr.id_gedung', '!=', 0);
        })->get();
    }

    public function listUnassigned()
    {
        return $this->join('sm_mahasiswa', function ($join) {
            $join->on('asrama_sr.nim', '=', 'sm_mahasiswa.nim')
                ->where('asrama_sr.id_gedung', '=', 0);
        })->get();
    }

    public function findByUsername($username)
    {
        return $this->where('username', $username)->limit(1)->get();
    }

    public function findById($id_sr)
    {
        return $this->join('sm_mahasiswa', function ($join) use ($id_sr) {
            $join->on('asrama_sr.nim', '=', 'sm_mahasiswa.nim')
                ->where('id_sr', $id_sr);
        })->limit(1)->get();
    }

    public function findByNIM($nim)
    {
        return $this->where('nim', $nim)->limit(1)->get();
    }

    public function new($data)
    {
        $this->nim = $data['nim'];
        $this->username = $data['username'];
        $this->password = $data['password'];

        $this->save();
    }

    public function remove($id_sr)
    {
        $sr = $this->findById($id_sr);
        $isExists = count($sr) == 1;

        if ($isExists) {
            return $this->where('id_sr', $id_sr)->delete();
        }

        return false;
    }
}
