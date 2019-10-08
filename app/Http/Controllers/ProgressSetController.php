<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Progress;
use App\Gamen;
use App\SelectStory;

use Cookie;

class ProgressSetController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $url = $request->input('url');

        $gamen = new Gamen();
        $data = $gamen->findByUrl($url);

        if (!$data) {
            return;
        }

        $progress_id = Cookie::get('progress_id');

        Progress::updateOrCreate(
            ['progress_id' => $progress_id],
            ['gamen_id' => $data['id']]
        );

        if (substr($data['url'], 0, 5) == 'event') {
            $story = mb_substr($data['url'], -2);

            SelectStory::updateOrCreate(
                ['progress_id' => $progress_id],
                ['story' => $story]
            );
        }

        return '{}';

    }

}
