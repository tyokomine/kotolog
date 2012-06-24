<?php
error_reporting(1);
session_start();
//test用の設定
require_once 'php/config.php';
require_once 'php/commons.php';

if (isset($_SESSION["id"])) {//POSTされたactionの値がsign inだったら
	jump("sample.php");
}else if (isset($_POST["action"]) && $_POST["action"] === "login") {//POSTされたactionの値がloginだったら
	//DBにメールアドレスを送ってパスワードを確認
	$mail = $_POST["mail"];

	//パスワード取得
	$sql = "select member_password from member where member_mail ='" . r($mail) . "'" . " or member_en_name = '" . r($mail) . "'";
	$result = mysql_query($sql);
	$password = mysql_fetch_array($result);

	//セッションに保存するためにid取得
	$sql = "select member_id from member where member_mail ='" . r($mail) . "'" . " or member_en_name = '" . r($mail) . "'";
	$result = mysql_query($sql);
	$id = mysql_fetch_array($result);

	//echo $password[0];
	if ($password[0] === $_POST["password"]) {//パスワード確認
		$_SESSION["id"] = $id[0];
		$_SESSION["password"] = md5($password[0]);
		//暗号化してセッションに保存
		setcookie("password", md5($password[0]));
		//暗号化してクッキーに保存
		header("Location: http://kotolog/sample.php");
		//sample.htmlに飛ばす

	} else {
		session_destroy();
		//セッション破棄
		setcookie("TEST", "", time() - 3600);
		//時間を過去に設定してクッキーを削除
		message();
		//エラー表示
	}
}else{
	jump("./login.html");
}

function message() {
	print "メールアドレスまたはパスワードが違います";
}



?>

