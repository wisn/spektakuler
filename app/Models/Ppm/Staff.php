<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'ppm_staffs';
    protected $primaryKey = 'id_staff';

    protected $fillable = [
        'username',
        'email',
        'password',
        'name',
    ];

    public function get($username) 
    {
        return $this->where('username', $username)->first();
    }

    public function getById($id_staff) 
    {
        return $this->where('id_staff', $id_staff)->first();
    }

    public function add($username, $email, $password, $name) 
    {
        $staff = new Staff;
        $staff->username = $username;
        $staff->email = $email;
        $staff->password = $password;
        $staff->name = $name;

        return $staff->save();
    }

    public function edit(Staff $staff, $email, $name) 
    {
        $staff->email = $email;
        $staff->name = $name;

        return $staff->save();
    }

    public function remove(Staff $staff) 
    {
        return $staff->delete();
    }
}