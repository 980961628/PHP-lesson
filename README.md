# PHP-lesson
PHP的学习课程
云之梦PHP课程

29 GD 库 20171009
    1.创建画布
    $img = imagecreatetruecolor(300,200);

    2.准备颜色
    $color1 = imagecolorallocate($img,0,0,0);

    3.填充画布
    imagefill($img,0,0,$color1);

    4.开始画
         *  imagesetpixel       点
         *  imageline           线
         *  imagerectangle      矩形
         *  imagefilledrectangle 填充矩形
         *  imageellipse        圆
         *  imagefilledellipse 填充圆
         *  imagepolygon        多边形
         *  imagefilledpolygon  填充多边形
         *  imagettftext        常用  第一个字的左下角坐标
    5.输出保存
    header('content-type:image/jpeg');
    imagejpeg($img,'images/1.jpg');

    6.释放资源
    imagedestroy($img);


