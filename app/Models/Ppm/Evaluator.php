<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    protected $table = 'ppm_evaluators';
    protected $primaryKey = 'id_evaluator';

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

    public function getById($id_evaluator) 
    {
        return $this->where('id_evaluator', $id_evaluator)->first();
    }

    public function add($username, $email, $password, $name) 
    {
        $evaluator = new Evaluator;
        $evaluator->username = $username;
        $evaluator->email = $email;
        $evaluator->password = $password;
        $evaluator->name = $name;

        return $evaluator->save();
    }

    public function edit(Evaluator $evaluator, $email, $name) 
    {
        $evaluator->email = $email;
        $evaluator->name = $name;

        return $evaluator->save();
    }

    public function remove(Evaluator $evaluator) 
    {
        return $evaluator->delete();
    }
}