<?php

namespace App\Models\Alumni;

use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Alumni extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = 'alumni';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['NIM', 'tahun_kelulusan'];

    public function listAlumni()
    {
        return $this->all();
    }


    public function remove($NIM) {
        $isExists = $this->where('NIM', $NIM)->limit(1)->count() == 1;

        if ($isExists) {
            return $this->where('NIM', $NIM)->delete();
        }

        return false;
    }

    public function findByNIM($NIM) {
        return $this->where('NIM', $NIM)->get();
    }
}
