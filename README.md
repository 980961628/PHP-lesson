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


     图片裁剪和缩放  31
        imagecopyresampled
          function thumb($src,$dst_w=300,$dst_h=300){
            $srcarr = getimagesize($src);
            $imagecreatefrom = null;
            $imageout = null;
            switch($srcarr[2]){
              case 1:
                $imagecreatefrom = 'imagecreatefromgif';
                $imageout = 'imagegif';
                break;
              case 2:
                $imagecreatefrom = 'imagecreatefromjpeg';
                $imageout = 'imagejpeg';
                break;
              case 3:
                $imagecreatefrom = 'imagecreatefrompng';
                $imageout = 'imagepng';
                break;
            }
            $src_image = $imagecreatefrom($src);
            //原图尺寸
            $src_w = imagesx($src_image);
            $src_h = imagesy($src_image);
            $scale = ($src_w/$dst_w) > ($src_h/$dst_h) ? $src_w/$dst_w : $src_h/$dst_h;
            $dst_w = floor( $src_w/$scale );
            $dst_h = floor( $src_h/$scale );

            $dst_image = imagecreatetruecolor($dst_w,$dst_h);
            $dst_x = 0;
            $dst_y = 0;
            $src_x = 0;
            $src_y = 0;
            imagecopyresampled($dst_image,$src_image,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h);

            $t_name = 't_'.basename($src);
            $t_dir = dirname($src);
            $s_file = $t_dir .'/'. $t_name;
        //    header('content-type:image/jpeg');
            $imageout($dst_image,$s_file);
          }


     图片水印
        imagecopy
     获取图片宽高
        getimagessize



