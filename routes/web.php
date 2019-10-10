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

Route::get('start', function () {
    return redirect('tutorial');
});

Route::get('tutorial', 'TutorialController@index');

Route::get('tutorial_end', 'TutorialEndController@index');

Route::get('character_select', 'CharacterSelectController@index');

Route::get('mypage_character_select', 'CharacterSelectController@mypageIndex');

Route::get('event/{id}', 'EventController@index');

Route::get('event_end/{id}', 'EventEndController@index');

Route::get('mypage', 'MyPageController@index');
