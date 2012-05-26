<?php
error_reporting(1);
session_start();

require_once './config.php';
require_once './commons.php';

//メールを送信する
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to = "himaratsu@gmail.com";
$message = $_POST['message'];
$subject = "kotolog feedback";
$headers = "From : himaratsu@gmail.com";

if (mb_send_mail($to, $subject, $message, $headers)) {
	jump("sample.php");
} else {
	echo "エラー：送信に失敗しました";
}
?>
