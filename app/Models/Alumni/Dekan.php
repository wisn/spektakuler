<?php

namespace App\Models\Alumni;

use Illuminate\Database\Eloquent\Model;

class Dekan extends Model
{
    protected $table = 'dekan';

    protected $fillable = [
        'idDekan',
        'nama',
        'umur',
        'jenis_kelamin'
    ];

    public function listDekan()
    {
        return $this->all();
    }

    public function findbyDekan($idDekan) {
        return $this->where('idDekan', $idDekan)->get();
    }

    public function newDekan($data) {

        $this->nama = $data['nama'];
        $this->umur = $data['umur'];
        $this->jenis_kelamin = $data['jenis_kelamin'];

        $this->save();
    }

    public function removeDekan($idDekan) {
        $isExists = $this->where('idDekan', $idDekan)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('idDekan', $idDekan)->delete();
        }

        return false;
    }
}
