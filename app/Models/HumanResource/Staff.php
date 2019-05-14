<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'hr_staff';

    protected $fillable = [
        'nip',
        'username',
        'password',
        'nama',
    ];

    public function list()
    {
        return $this->all();
    }

    public function findByUsername($username) {
        return $this->where('username', $username)->limit(1)->get();
    }
}
