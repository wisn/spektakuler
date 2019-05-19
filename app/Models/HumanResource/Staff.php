<?php
namespace App\Models\HumanResource;
use Illuminate\Database\Eloquent\Model;
class Staff extends Model
{
    protected $table = 'hr_staff';
    protected $fillable = [
        'nip_staff',
        'jenis_staff',
        'nama',
        'alamat',
        'ttl',
        'nohp',
        'gaji',
        'id_fakultas',
    ];
    public function listStaff()
    {
        return $this->all();
    }
    public function findbyNIP($nip_staff) {
        return $this->where('nip_staff', $nip_staff)->get();
    }
    public function findbyFakultas($id_fakultas) {
        return $this->where('id_fakultas', $id_fakultas)->get();
    }    
    public function newStaff($data) {
        $this->nip_staff = $data['nip_staff'];
        $this->jenis_staff = $data['jenis_staff'];
        $this->nama = $data['nama'];
        $this->alamat = $data['alamat'];
        $this->ttl = $data['ttl'];
        $this->nohp = $data['nohp'];
        $this->gaji = $data['gaji'];
        $this->id_fakultas = $data['id_fakultas'];
        $this->save();
    }
    public function removeStaff($nip_staff) {
        $isExists = $this->where('nip_staff', $nip_staff)->limit(1)->count() == 1;
        if ($isExists) {
            return $this->where('nip_staff', $nip_staff)->delete();
        }
        return false;
    }
}
