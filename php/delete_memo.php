<?php
error_reporting(1);
session_start();

require_once 'config.php';
require_once 'commons.php';

$id = $_SESSION['id'];
$contents = $_GET['contents'];

$sql = "delete from memo where memo_member_id = ".r($id)." and memo_contents='".r($contents)."'";
$result_flag = mysql_query($sql);

if (!$result_flag) {
    die('deleteクエリーが失敗しました。'.mysql_error());
}
jump("sample.php");
?>