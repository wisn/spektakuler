<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'asrama_mahasiswa';

    protected $fillable = [
        'nim',
        'username',
        'password',
    ];

    public function list()
    {
        return $this->all();
    }

    public function findByUsername($username) {
        return $this->where('username', $username)->limit(1)->get();
    }
}
