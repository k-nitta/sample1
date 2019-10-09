<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convert extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

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
