<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

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
