<?php

namespace App\Models\StudentManagement;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'sm_mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'gender',
        'angkatan',
        'fakultas',
        'program_studi',
        'alamat',
    ];

    public function list()
    {
        return $this->all();
    }

    public function findByNIM($nim)
    {
        return $this->where('nim', $nim)->limit(1)->get();
    }

    public function new($data)
    {
        $this->nim = $data['nim'];
        $this->nama = $data['nama'];
        $this->gender = $data['gender'];
        $this->angkatan = $data['angkatan'];
        $this->fakultas = $data['fakultas'];
        $this->program_studi = $data['program_studi'];
        $this->alamat = $data['alamat'];

        $this->save();
    }

    public function remove($nim)
    {
        $isExists = $this->where('nim', $nim)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('nim', $nim)->delete();
        }

        return false;
    }
}
