<?php
namespace app\Libs;

use App\MyRoomImg;

use Cookie;

class ImageConvert
{
    public static function convert($myRoom, $fuku) {

        //$path = public_path('img/chara_main.png');

        $chracterImg = imagecreatefrompng(public_path('img/chara_main.png'));
        imageLayerEffect($chracterImg, IMG_EFFECT_ALPHABLEND);
        imagecolortransparent($chracterImg, imagecolorallocate($chracterImg, 0, 0, 0));

        list($width, $height) = getimagesize(public_path('img/chara_main.png'));

        if ($fuku) {

            $fukuImg = imagecreatefrompng(public_path('img/' . $fuku)); 
            imagecolortransparent($fukuImg, imagecolorallocate($fukuImg, 0, 0, 0));
            list($subwidth, $subheight) = getimagesize(public_path('img/' . $fuku));

            imagecopy($chracterImg, $fukuImg, $width / 2 - ($subwidth / 2), 0, 0, 0, $width, $height);
        }

        // 部屋の画像取得
        $roomImg = imagecreatefrompng(public_path('img/' . $myRoom));
        list($roomWidth, $roomHeight) = getimagesize(public_path('img/' . $myRoom));

        imageLayerEffect($roomImg, IMG_EFFECT_ALPHABLEND);
        imagecolortransparent($roomImg, imagecolorallocate($roomImg, 0, 0, 0));

        imagecopy($roomImg, $chracterImg, $roomWidth / 2 - ($width / 2), 0, 0, 0, $roomWidth, $roomHeight);

        $outputImg = imagecreatetruecolor($roomWidth, $roomHeight);
        imageLayerEffect($outputImg, IMG_EFFECT_ALPHABLEND);
        imagecolortransparent($outputImg, imagecolorallocate($outputImg, 0, 0, 0));

        imagecopy($outputImg, $roomImg, 0, 0, 0, 0, $roomWidth, $roomHeight);

        $progress_id = Cookie::get('progress_id');
        $myRoomImg = MyRoomImg::updateOrCreate(
            ['progress_id' => $progress_id]
        )->toArray();

        imagepng( $outputImg, public_path('img/' . $myRoomImg['id'] . '.png'));
        imagedestroy($outputImg);

        return;
    }
}