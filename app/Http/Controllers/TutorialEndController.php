<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class TutorialEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $progress_id = \Cookie::get('progress_id');

        $event = new Event();

        \App\ClearEvent::updateOrCreate(
            ['progress_id' => $progress_id],
            ['event_id' => $event->findByEvent('tutorial')['id']]
        );

        \ImageConvert::convert('myRoom1.png', null);

        return view('tutorial_end');
    }
}
