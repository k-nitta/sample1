<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectCharacter extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = ['progress_id', 'character_id'];

    public function findByProgressId($progress_id)
    {
        $query = SelectCharacter::query();
        $query->where('progress_id', $progress_id);

        $result = $query->get();

        $result = $result->toArray();

        if (!$result) {
            return null;
        }

        return $result[0];
    }

}
