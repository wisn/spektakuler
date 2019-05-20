<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'asrama_staff';

    protected $fillable = [
        'nip_staff',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function list()
    {
        return $this->all();
    }

    public function findByUsername($username) {
        return $this->where('username', $username)->limit(1)->get();
    }
}
