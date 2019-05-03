<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'ppm_papers';

    protected $fillable = [
        'id_paper',
        'title',
        'date',
        'fund',
        'status',
        'id_event',
        'nip_dosen',
        'id_staff'
    ];

    public function list()
    {
        return $this->all();
    }

    public function listByStatus($status)
    {
        return $this->where('status', $status)->get();
    }

    public function listByEvent($event)
    {
        return $this->where('id_event', $event)->get();
    }
}