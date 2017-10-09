<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/9
 * Time: 16:22
 */
/*
 * 1.验证码实例
 *
 * */

  session_start();
//  echo $_SESSION['verify'];
  if(strtolower($_POST['fcode']) == strtolower($_SESSION['verify'])){
    echo 'ok';
  }else{
    echo 'no';
  }
//  var_dump($_POST);