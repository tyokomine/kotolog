<?php
error_reporting(1);
session_start();

require_once 'config.php';
require_once 'commons.php';

$id = $_SESSION['id'];
$contents = $_POST['contents'];
$citation = $_POST['citation'];
$category = $_POST['category'];
$sql = "insert into memo (memo_member_id,memo_contents,memo_citation,memo_category,memo_add_date,memo_update_date)
		 values (".r($id).",'".r($contents)."','".r($citation)."','".r($category)."',now(),now())";

$result_flag = mysql_query($sql);

if (!$result_flag) {
    die('INSERTクエリーが失敗しました。'.mysql_error());
}
jump("sample.php");
?>