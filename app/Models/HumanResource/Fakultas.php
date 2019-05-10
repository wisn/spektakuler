<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'hr_fakultas';

    protected $fillable = [
        'id_fakultas',
        'nama_fakultas',
    ];

	public function listFakultas()
	{
		return $this->all();
	}	
	
}
