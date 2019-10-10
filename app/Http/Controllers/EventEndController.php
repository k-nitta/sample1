<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\GetItem;
use App\Gamen;

class EventEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $event = 'event' . $id;

        $progress_id = \Cookie::get('progress_id');

        $eventModel = new Event();
        $data = $eventModel->findByEvent($event);

        \App\ClearEvent::updateOrCreate(
            ['progress_id' => $progress_id],
            ['event_id' => $data['id']]
        );

        $getItem = new GetItem();
        $item = $getItem->where('progress_id', $progress_id)->where('item_id', $data['item_id'])->get();

        $deleted = $getItem->withTrashed()->where('progress_id', $progress_id)->where('item_id', $data['item_id'])->get();

        if (empty($item->toArray()) && empty($deleted->toArray())) {
            $getItem->progress_id = $progress_id;
            $getItem->item_id = $data['item_id'];
            $getItem->save();
        }

        $gamen = new Gamen();
        $mypage = $gamen->findByUrl('mypage');

        \App\Progress::updateOrCreate(
            ['progress_id' => $progress_id],
            ['gamen_id' => $mypage['id']]
       );

        return redirect('mypage');
    }
}
