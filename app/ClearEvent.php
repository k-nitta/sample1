<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClearEvent extends Model
{
    protected $guarded = ['id'];

    public function findByProgressId($progress_id)
    {
        $query = ClearEvent::query();
        $query->where('progress_id', $progress_id);

        $result = $query->get();

        $result = $result->toArray();

        if (!$result) {
            return null;
        }

        return $result[0];
    }

}
