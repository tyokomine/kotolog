<?php
error_reporting(1);
session_start();

require_once './config.php';
require_once './commons.php';

// if (isset($_POST["action"]) && $_POST["action"] === "set") {//POSTされたactionの値がsign inだったらd"];

$id = $_SESSION["id"];
$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['password'];

$sql = "update member set member_en_name = '" . r($name) . "',member_mail = '" . r($mail) . "',member_password = '" . r($password) . "',member_access_date = now()
			where member_id =" . r($id) . "";
$result_flag = mysql_query($sql);
//echo $sql;
if (!$result_flag) {
	die('updateクエリーが失敗しました。' . mysql_error());
}

// }
jump("sample.php");
?>