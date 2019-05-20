<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    protected $table = 'asrama_mahasiswa';

    protected $fillable = [
        'id_mahasiswa',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function list()
    {
        return $this->all();
    }

    public function listDetail()
    {
        return $this->join('sm_mahasiswa', function ($join) {
            $join->on('asrama_mahasiswa.id_mahasiswa', '=', 'sm_mahasiswa.id_mahasiswa');
        })->get();
    }

    public function isSr($id_mahasiswa)
    {
        $mahasiswa = DB::table('sm_mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->get();
        if (count($mahasiswa) == 0) return false;

        $nim = $mahasiswa[0]->nim;

        $sr = DB::table('asrama_sr')->join('sm_mahasiswa', function ($join) use ($nim) {
            $join->on('asrama_sr.nim', '=', 'sm_mahasiswa.nim')
                ->where('sm_mahasiswa.nim', $nim);
        })->get();

        return count($sr) == 1;
    }

    public function findByUsername($username)
    {
        return $this->where('username', $username)->limit(1)->get();
    }

    public function findById($id_mahasiswa)
    {
        return $this->join('sm_mahasiswa', function ($join) use ($id_mahasiswa) {
            $join->on('asrama_mahasiswa.id_mahasiswa', '=', 'sm_mahasiswa.id_mahasiswa')
                ->where('asrama_mahasiswa.id_mahasiswa', $id_mahasiswa);
        })->limit(1)->get();
    }

    public function new($data)
    {
        $this->id_mahasiswa = $data['id_mahasiswa'];
        $this->username = $data['username'];
        $this->password = $data['password'];

        $this->save();
    }
}
