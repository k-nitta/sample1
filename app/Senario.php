<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senario extends Model
{

    public function findEvent($name, $id)
    {
        $query = Senario::query();
        $query->where('name', $name); 
        $query->where('seen_id', $id);
        return $query->get()->toArray();
    }
}
