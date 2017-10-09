<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/9
 * Time: 16:22
 */
    /*
     * GD 库
     *
     * 1.创建画布
     * 2.准备颜色
     * 3.填充画布
     * 4.开始画
     *
     *  imagesetpixel       点
     *  imageline           线
     *  imagerectangle      矩形
     *  imagefilledrectangle 填充矩形
     *  imageellipse        圆
     *  imagefilledellipse 填充圆
     *  imagepolygon        多边形
     *  imagefilledpolygon  填充多边形
     *  imagettftext        常用  第一个字的左下角坐标
     *
     * 5.输出保存
     * 6.释放资源
     * */

    session_start();
    header('content-type:image/jpeg');

    $img = imagecreatetruecolor(150,50);

    $color1 = imagecolorallocate($img,0,0,0);
    $color2 = imagecolorallocate($img,255,0,0);
    $color3 = imagecolorallocate($img,0,255,0);
    $color4 = imagecolorallocate($img,0,0,255);
    $color5 = imagecolorallocate($img,255,255,255);

    imagefill($img,0,0,$color1);
//
//    imagesetpixel($img,10,10,$color5);
//    imagesetpixel($img,mt_rand(0,300),mt_rand(0,300),$color5);
//    imageline($img,10,10,100,100,$color4);
//    imagerectangle($img,100,100,50,50,$color3);
//    imagefilledrectangle($img,20,20,50,50,$color4);
//    imageellipse($img,200,50,50,50,$color5);
//    imagefilledellipse($img,200,100,50,50,$color5);
//    $arr = [250,0,10,150,490,150];
//    imagefilledpolygon($img,$arr,3,$color4);
//    imagestring($img,5,80,80,'AAAAAA',$color5);

    for($i=0;$i<100;$i++){
        imagesetpixel($img,mt_rand(0,150),mt_rand(0,50),$color5);
    }
    $arr = array_merge(range(0,9),range('a','z'),range('A','Z'));
    shuffle($arr);
    $str = join('',array_splice($arr,0,4));
    $_SESSION['verify']=$str;
    imagettftext($img,20,0,50,30,$color5,'fonts/ygyxsziti2.0.ttf',$str);
//    imagejpeg($img,'images/1.jpg');
    imagejpeg($img);
    imagedestroy($img);

