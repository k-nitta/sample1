<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClearEvent;
use App\Event;
use App\Item;
use App\SelectCharacter;
use App\Character;
use App\SelectStory;
use App\MyRoomImg;
use App\GetItem;

use Cookie;

class MyPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $clearEvent = new ClearEvent();

        $progress_id = Cookie::get('progress_id');

        $clear_item = null;

        $clear_event = $clearEvent->findByProgressId($progress_id);
        $event = new Event();
        if ($clear_event) {
            $event = new Event();
            $item = new Item();

            $clear = $event->find($clear_event['event_id']);
            $clear_item = $item->find($clear['item_id'])->toArray();



            $getItem = new GetItem();
            $get_item = $getItem->where('progress_id', $progress_id)->where('item_id', $clear_item['id'])->get();



            if ($get_item->toArray()) {
                $get_item = $get_item->toArray()[0];
                $getItem->find($get_item['id'])->delete();
            } else {
                $clear_item = null;
            }

        }

        $view_character = $this->viewCharacter($progress_id);

        $event_list = $event->findByCharacterId($view_character['id']);

        $story = $this->selectStory($progress_id);

        $my_room_img = $this->myRoomImg($progress_id);

        return view('mypage', compact('my_room_img', 'view_character', 'story', 'event_list', 'clear_item'));

    }

    private function viewCharacter($progress_id)
    {
        $selectCharacter = new SelectCharacter();
        $select_character = $selectCharacter->findByProgressId($progress_id);

        $character = new Character();
        return  $character->find($select_character['character_id'])->toArray();
    }

    private function selectStory($progress_id)
    {
        $selectStory = new SelectStory();
        $select_story = $selectStory->findByProgressId($progress_id);

        return $select_story['story'];
    }

    private function myRoomImg($progress_id)
    {
        $myRoomImg = new MyRoomImg();
        $myRoomImg = $myRoomImg->findByProgressId($progress_id);

        return $myRoomImg;
    }

}
