<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'hr_cuti';

    protected $fillable = [
        'jeniscuti',
        'rentangtanggal',
        'status',
        'keterangan',
        'nip',
        'id_fakultas',
    ];
    public function listCuti()
    {
        return $this->all();

    }
    public function fetchCutibyAdmin($id_fakultas)
    {
        return Cuti::whereRaw('id_fakultas = "'.$id_fakultas.'" and status = "not approved"')->get();         
    }
    public function fetchCutibyNIP($nip)
    {
        return Cuti::whereRaw('nip = "'.$nip.'"')->get();         
    }      
    public function newCuti($data) {
        $this->jeniscuti = $data['jeniscuti'];
        $this->rentangtanggal = $data['rentangtanggal'];
        $this->status = $data['status'];
        $this->keterangan = $data['keterangan'];
        $this->nip = $data['nip'];
        $this->id_fakultas = $data['id_fakultas'];
        $this->save();
    }
    
}
