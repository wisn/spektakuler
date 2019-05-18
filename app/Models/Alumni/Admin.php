<?php

namespace App\Models\Alumni;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'adminalumni';

    protected $fillable = [
        'idAdmin',
        'nama',
        'umur',
        'jenis_kelamin'
    ];

    public function listAdmin()
    {
        return $this->all();
    }

    public function findbyAdmin($idAdmin) {
        return $this->where('idAdmin', $idAdmin)->get();
    }

    public function newAdmin($data) {

        $this->idAdmin = $data['idAdmin'];
        $this->nama = $data['nama'];
        $this->umur = $data['umur'];
        $this->jenis_kelamin = $data['jenis_kelamin'];

        $this->save();
    }

    public function removeAdmin($idAdmin) {
        $isExists = $this->where('idAdmin', $idAdmin)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('idAdmin', $idAdmin)->delete();
        }

        return false;
    }
}
