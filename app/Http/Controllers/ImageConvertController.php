<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libs\ImageConvert;
use App\Convert;

use Cookie;

class ImageConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->input('img');
        $type = $request->input('type');

        $progress_id = Cookie::get('progress_id');

        $convert = new Convert();
        $convert->progress_id = $progress_id;
        $convert->type = $type;
        $convert->img = $img;
        $convert->save();

        $datas = $convert->findByProgressId($progress_id);

        $roomImg = 'myRoom1.png';
        $fukuImg = null;
        foreach ($datas as $data) {
            if ($data['type'] == '1') {
                $fukuImg = $data['img'];
            } else {
                $roomImg = $data['img'];
            }
        }

        ImageConvert::convert($roomImg, $fukuImg);

        return '{}';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
