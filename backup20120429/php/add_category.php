<?php
error_reporting(1);
session_start();

require_once 'config.php';
require_once 'commons.php';

$id = $_SESSION['id'];
$category = $_POST['category'];
$sql = "insert into category (category_member_id,category_name,category_add_date,category_update_date)
		 values (".r($id).",'".r($category)."',now(),now())";
$result_flag = mysql_query($sql);

if (!$result_flag) {
    die('INSERTクエリーが失敗しました。'.mysql_error());
}
jump("sample.php");
?>