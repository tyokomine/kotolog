<?php
error_reporting(1);
session_start();

require_once './config.php';
require_once './commons.php';

// if (isset($_POST["action"]) && $_POST["action"] === "set") {//POSTされたactionの値がsign inだったらd"];

$id = $_SESSION['id'];
$contents = $_POST['contents'];
$citation = $_POST['citation'];
$category = $_POST['category'];

$sql = "select memo_id from memo where memo_member_id=".r($id)." and memo_contents = '" . r($contents) . "'";
//echo $sql;
$result = mysql_query($sql);
$memo_id = mysql_fetch_array($result);
//echo $memo_id[0];

$sql = "update memo set memo_contents = '" . r($contents) . "',memo_citation = '" . r($citation) . "',memo_category = '" . r($category) . "',memo_update_date = now()
			where memo_id =" . r($memo_id[0]) . "";
$result_flag = mysql_query($sql);
//echo $sql;
if (!$result_flag) {
	die('updateクエリーが失敗しました。' . mysql_error());
}
// }
jump("sample.php");
?>