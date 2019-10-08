<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamen extends Model
{
    protected $guarded = ['id'];

    public function findByUrl($url)
    {
        $query = Gamen::query();
        $query->where('url', $url);

        $result = $query->get();

        $result = $result->toArray();

        if (!$result) {
            return null;
        }

        return $result[0];
    }

}
