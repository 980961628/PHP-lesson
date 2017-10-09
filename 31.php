<?php
  /*
   * 图片裁剪和缩放
   * */
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

//  thumb('images/2.jpg');
//

     /*
      * 水印
      * */
    $dst_image=imagecreatefromjpeg('images/2.jpg');
    $src_image=imagecreatefrompng('images/love.png');
    $dst_x=0;
    $dst_y=0;
    $src_x=0;
    $src_y=0;
    $src_w=40;
    $src_h=40;
    imagecopy($dst_image,$src_image,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h);
    header('content-type:image/png');
    imagejpeg($dst_image);


