<?php

namespace App\Model\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'hr_cuti';

    protected $fillable = [
        'jeniscuti',
        'rentangtanggal',
        'status',
        'nip_dosen',
        'nip_staff',        
    ];
    public function listCuti()
    {
        return $this->all();
    } 
    public function newCuti($data) {
        $this->jeniscuti = $data['jeniscuti'];
        $this->rentangtanggal = $data['rentangtanggal'];
        $this->status = $data['status'];
        $this->nip_dosen = $data['nip_dosen'];
        $this->nip_staff = $data['nip_staff'];
        $this->save();
    }  
}
