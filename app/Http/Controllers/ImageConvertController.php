<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libs\ImageConvert;
use App\Convert;

use Cookie;

class ImageConvertController extends Controller
{

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

        $convert->where('progress_id', $progress_id)
                ->where('type', $type)
                ->delete();

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

}
