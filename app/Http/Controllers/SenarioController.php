<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Senario;

class SenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $name = $request->input('name');
        $seen_id = $request->input('seen_id');

        $senario = new Senario();

        $user = $senario->findEvent($name, $seen_id)[0];

        return $user['data'];

    }

}
