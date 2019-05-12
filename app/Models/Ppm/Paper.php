<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'ppm_papers';
    protected $primaryKey = 'id_paper';

    protected $fillable = [
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

    public function listByEvent($id_event)
    {
        return $this->where('id_event', $id_event)->get();
    }

    public function get($id_paper) 
    {
        return $this->where('id_paper', $id_paper)->first();
    }

    public function add($title, $date, $fund, $status, $id_event, $nip_dosen) 
    {
        $paper = new Paper;
        $paper->title = $title;
        $paper->date = $date;
        $paper->fund = $fund;
        $paper->status = $status;
        $paper->id_event = $id_event;
        $paper->nip_dosen = $nip_dosen;

        return $paper->save();
    }

    public function edit(Paper $paper, $title, $date, $fund) 
    {
        $paper->title = $title;
        $paper->date = $date;
        $paper->fund = $fund;

        return $paper->save();
    }

    public function changeStatus(Paper $paper, $status)
    {
        $paper->status = $status;

        return $paper->save();
    }

    public function remove(Paper $paper) 
    {
        return $paper->delete();
    }
}