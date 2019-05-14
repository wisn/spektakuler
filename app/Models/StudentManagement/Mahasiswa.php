<?php

namespace App\Models\StudentManagement;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'sm_mahasiswa';

    protected $fillable = [
        'nim',
        'username',
        'password',
        'nama',
        'fakultas',
        'prodi',
        'angkatan',
    ];

    public function list()
    {
        return $this->all();
    }

    public function findByUsername($username) {
        return $this->where('username', $username)->limit(1)->get();
    }
}
