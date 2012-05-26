<?php
error_reporting(1);
session_start();

require_once 'config.php';
require_once 'commons.php';

$id = $_SESSION['id'];
$contents = $_POST['category'];

$sql = "delete from category where category_member_id = ".r($id)." and category_name='".r($category)."'";
$result_flag = mysql_query($sql);


if (!$result_flag) {
    die('deleteクエリーが失敗しました。'.mysql_error());
}
jump("index.php");
?>