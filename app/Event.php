<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function findByEvent($event)
    {
        $query = Event::query();
        $query->where('event', $event);

        $result = $query->get();

        $result = $result->toArray();

        if (!$result) {
            return null;
        }

        return $result[0];
    }

    public function findByCharacterId($character_id)
    {
        $param = 'event' . $character_id;
        $query = Event::query();
        $query->where('event', 'like', "{$param}%")->get();

        $result = $query->get();

        $result = $result->toArray();

        if (!$result) {
            return null;
        }

        return $result;
    }

/*
    public function item()
    {
        return $this->hasOne('App\Item');
    }
*/
}
