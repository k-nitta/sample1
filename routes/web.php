<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top');
});

Route::get('/start', function () {
    return redirect('tutorial');
});

Route::get('/tutorial', function () {
    $event = 'tutorial';

    $obj = new \App\Event();
    $data = $obj->findByEvent($event);

    $title = $data['title'];
    $detail = $data['detail'];
    $back_img = $data['back_img'];
    return view('senario', compact('event', 'title', 'detail', 'back_img'));
});

Route::get('tutorial_end', function () {

    $progress_id = Cookie::get('progress_id');

    $event = new \App\Event();

    \App\ClearEvent::updateOrCreate(
        ['progress_id' => $progress_id],
        ['event_id' => $event->findByEvent('tutorial')['id']]
    );

    ImageConvert::convert('myRoom1.png', null);

    return view('tutorial_end');
});

Route::get('character_select', 'CharacterSelectController@index');

Route::get('mypage_character_select', 'CharacterSelectController@mypageIndex');

Route::get('/event/{id}', function ($id) {
    $event = 'event' . $id;

    $obj = new \App\Event();
    $data = $obj->findByEvent($event);

    $title = $data['title'];
    $detail = $data['detail'];
    $back_img = $data['back_img'];

    return view('senario', compact('event', 'title', 'detail', 'back_img'));
});

Route::get('/event_end/{id}', function ($id) {
    $event = 'event' . $id;

    $progress_id = Cookie::get('progress_id');

    $obj = new \App\Event();
    $data = $obj->findByEvent($event);

    \App\ClearEvent::updateOrCreate(
        ['progress_id' => $progress_id],
        ['event_id' => $data['id']]
    );

    $obj = new \App\GetItem();
    $item = $obj->where('progress_id', $progress_id)->where('item_id', $data['item_id'])->get();

    $deleted = $obj->withTrashed()->where('progress_id', $progress_id)->where('item_id', $data['item_id'])->get();

    if (empty($item->toArray()) && empty($deleted->toArray())) {
        $obj->progress_id = $progress_id;
        $obj->item_id = $data['item_id'];
        $obj->save();
    }

    $obj = new \App\Gamen();
    $mypage = $obj->findByUrl('mypage');

    \App\Progress::updateOrCreate(
        ['progress_id' => $progress_id],
        ['gamen_id' => $mypage['id']]
   );

    return redirect('mypage');
});

Route::get('mypage', 'MyPageController@index');
