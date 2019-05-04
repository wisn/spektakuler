<?php

namespace App\Models\Alumni;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'NIM',
        'tahun_kelulusan'
    ];

    public function listAlumni()
    {
        return $this->all();
    }

    public function findbyNIM($NIM) {
        return $this->where('NIM', $NIM)->get();
    }

    public function newAlumni($data) {

        $this->NIM = $data['NIM'];
        $this->tahun_kelulusan = $data['tahun_kelulusan'];

        $this->save();
    }

    public function removeAlumni($NIM) {
        $isExists = $this->where('NIM', $NIM)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('NIM', $NIM)->delete();
        }

        return false;
    }
}
