<?php

namespace App\Model\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'hr_dosen';

    protected $fillable = [
        'nip_dosen',
        'kodedosen',
        'nama',
        'alamat',
        'ttl',
        'nohp',
        'gaji',
        'id_fakultas',
    ];
    public function listDosen()
    {
        return $this->all();
    }
    public function findbyNIP($nip_dosen) {
        return $this->where('nip_dosen', $nip_dosen)->get();
    }
    public function findbyFakultas($id_fakultas) {
        return $this->where('id_fakultas', $id_fakultas)->get();
    }
    public function newDosen($data) {
        $this->nip_dosen = $data['nip_dosen'];
        $this->kodedosen = $data['kodedosen'];
        $this->nama = $data['nama'];
        $this->alamat = $data['alamat'];
        $this->ttl = $data['ttl'];
        $this->nohp = $data['nohp'];
        $this->gaji = $data['gaji'];
        $this->id_fakultas = $data['id_fakultas'];
        $this->save();
    }
    public function removeDosen($nip_dosen) {
        $isExists = $this->where('nip_dosen', $nip_dosen)->limit(1)->count() == 1;
        if ($isExists) {
            return $this->where('nip_dosen', $nip_dosen)->delete();
        }
        return false;
    }
}
