<?php
error_reporting(1);
session_start();
//test用の設定
require_once 'config.php';
require_once 'commons.php';

if(isset($_SESSION["id"])){//login状態だったら
  	session_destroy();//セッション破棄
    setcookie("TEST", "", time() - 3600);//時間を過去に設定してクッキーを削除
    jump("index.php");
}
?>