<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SelectCharacter;

use Cookie;

class SelectCharacterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $character_id = $request->input('character_id');

        $progress_id = Cookie::get('progress_id');

        SelectCharacter::updateOrCreate(
            ['progress_id' => $progress_id],
            ['character_id' => $character_id]
        );

        return '{}';
    }

}
