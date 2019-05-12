<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Subwriter extends Model
{
    protected $table = 'ppm_subwriters';

    protected $fillable = [
        'nim_mahasiswa',
        'id_paper',
    ];

    public function listByPaper($id_paper)
    {
        return $this->where('id_paper', $id_paper)->get();
    }

    public function listByMahasiswa($nim_mahasiswa)
    {
        return $this->where('nim_mahasiswa', $nim_mahasiswa)->get();
    }

    public function get($id_paper, $nim_mahasiswa)
    {
        return $this->where(['id_paper' => $id_paper, 'nim_mahasiswa' => $nim_mahasiswa])->first();
    }
    
    public function add($id_paper, $nim_mahasiswa)
    {
        $subwriter = new Subwriter;
        $subwriter->id_paper = $id_paper;
        $subwriter->nim_mahasiswa = $nim_mahasiswa;

        return $subwriter->save();
    }

    public function remove(Subwriter $subwriter)
    {
        return $subwriter->delete();
    }
}