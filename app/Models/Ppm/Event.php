<?php

namespace App\Models\Ppm;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'ppm_events';
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date'
    ];

    public function list()
    {
        return $this->all();
    }

    public function get($id_event) 
    {
        return $this->where('id_event', $id_event)->first();
    }

    public function add($name, $description, $start_date, $end_date) 
    {
        $event = new Event;
        $event->name = $name;
        $event->description = $description;
        $event->start_date = $start_date;
        $event->end_date = $end_date;

        return $event->save();
    }

    public function edit(Event $event, $name, $description, $start_date, $end_date) 
    {
        $event->name = $name;
        $event->description = $description;
        $event->start_date = $start_date;
        $event->end_date = $end_date;

        return $event->save();
    }

    public function remove(Event $event) 
    {
        return $event->delete();
    }
}