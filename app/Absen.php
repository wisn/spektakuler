<?php

namespace App\Model\HumanResource;

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
        return Absen::whereRaw('id_fakultas = "'.$id_fakultas.'" and status = "not approved"')->get();
        // return select('SELECT * FROM hr_absen where status = "not approved"')->get();
               
        // $query = "SELECT * FROM hr_absen where id_fakultas = $id_fakultas and status = 'not approved'";
        // $safe_string = Absen::getPdo()->quote($string);
        // return $safe_string->get();
        // $query = Absen::raw("FROM hr_absen where id_fakultas = $id_fakultas and status = 'not approved'");
        // return $query->get();        
        // $query = $this->where('id_fakultas', $id_fakultas)->orwhere('status','not approved');
        // return $query->get();        
        // $query= "SELECT * FROM hr_absen where id_fakultas = $id_fakultas and status = 'not approved'";
        // return $query;
        // $this->where('id_fakultas', $id_fakultas);
        // return $this->orwhere('status','not approved')->get();
        // return $this->where('id_fakultas', $id_fakultas)->get();
    }
    
}
