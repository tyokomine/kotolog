<?php
error_reporting(1);
session_start();

require_once 'config.php';
require_once 'commons.php';

$id = $_SESSION['id'];
$contents = $_GET['contents'];

$sql = "select * from memo where memo_contents='" . r($contents) . "'";
$result = mysql_query($sql);

if (!$result) {
	die('selectクエリーが失敗しました。' . mysql_error());
} else {
	$data = mysql_fetch_assoc($result);
	//echo "contents = " . $data['memo_contents'] . "<br>";
	//echo "citation = " . $data['memo_citation'] . "<br>";
	//echo "category = " . $data['memo_category'] . "<br>";
	
	$contents = $data['memo_contents'];
	$citation = $data['memo_citation'];
	$category = $data['memo_category'];

	$sql = "insert into memo (memo_member_id,memo_contents,memo_citation,memo_category,memo_add_date,memo_update_date)
		 values (" . r($id) . ",'" . r($contents) . "','" . r($citation) . "','" . r($category) . "',now(),now())";

	$result_flag = mysql_query($sql);

	if (!$result_flag) {
		die('INSERTクエリーが失敗しました。' . mysql_error());
	}

}

jump("sample.php");
?>