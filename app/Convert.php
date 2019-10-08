<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convert extends Model
{
    public function findByProgressId($progress_id)
    {
        $query = Convert::query();
        $query->where('progress_id', $progress_id);

        $result = $query->get();

        $result = $result->toArray();

        if (!$result) {
            return null;
        }

        return $result;
    }
}
