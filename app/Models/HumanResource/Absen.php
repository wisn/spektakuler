<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'hr_absen';

    protected $fillable = [
        'nip',
        'id_fakultas',
        'status',
    ];
    public function listAbsen()
    {
        return $this->all();
    }
    public function newAbsen($data) {
        $this->nip = $data['nip'];
        $this->id_fakultas = $data['id_fakultas'];
        $this->status = $data['status'];
        $this->save();
    }
    public function fetchAbsenbyAdmin($id_fakultas)
    {
        $this->where('id_fakultas', $id_fakultas);
        return $this->orwhere('status','not approved')->get();
    } 
}
