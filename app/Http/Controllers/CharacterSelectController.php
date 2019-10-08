<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

class CharacterSelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $characters = Character::all();

        return view('character_select', compact('characters'));

    }

    public function mypageIndex(Request $request)
    {

        $characters = Character::all();

        return view('mypage_character_select', compact('characters'));

    }

}
