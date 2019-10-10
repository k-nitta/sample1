<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $event = 'event' . $id;

        $eventModel = new Event();
        $data = $eventModel->findByEvent($event);

        $title = $data['title'];
        $detail = $data['detail'];
        $back_img = $data['back_img'];

        return view('senario', compact('event', 'title', 'detail', 'back_img'));
    }
}
