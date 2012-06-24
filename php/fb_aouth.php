<?php
error_reporting(1);
session_start();
require_once '../fb_src/facebook.php';
require_once './config.php';
require_once './commons.php';

$config = array();
$config['appId'] = facebook_app_id;
$config['secret'] = facebook_secret_id;
//インスタンス生成
$facebook = new Facebook($config);
$uid = $facebook -> getUser();
//ログイン認証
$code = $_REQUEST["code"];
if ($uid && !(empty($code))) {
	//if ($uid) {
	$access_token = $facebook -> getAccessToken();
	//DBですでに登録されてるか判定（fb_idで判定）
	$fb_data = $facebook -> api('/me');
	$sql = "select member_id member_fb_id from member where member_fb_id ='" . $fb_data["id"] . "'";
	$result = mysql_query($sql);
	$sql_result = mysql_fetch_array($result);
	$id=$sql_result[0];
	$fb_id=$sql_result["member_fb_id"];
	//登録されてなかったらDBにユーザ追加
	if (!$fb_id) {
		$user_profile = $facebook -> api('/me');
		$sql = "insert into member (member_en_name,member_fb_id,member_is_valid,member_regi_date,member_access_date)
			 values ('" . r($user_profile["name"]) . "','" . r($user_profile["id"]) . "',1,now(),now())";
		$result_flag = mysql_query($sql);
		//echo $sql;
		if (!$result_flag) {
			die('INSERTクエリーが失敗しました。' . mysql_error());
		}

		//id取得
		$sql = "select member_id from member where member_fb_id ='" . r($user_profile["id"]) . "'" . " and member_en_name = '" . r($user_profile["name"]) . "'";
		$result = mysql_query($sql);
		$id = mysql_fetch_array($result);
		
		//カテゴリHomeを追加
		$category = "Home";
		$sql = "insert into category (category_member_id,category_name,category_add_date,category_update_date)
			 values (" . r($id[0]) . ",'" . r($category) . "',now(),now())";
		$result_flag = mysql_query($sql);
		if (!$result_flag) {
			die('INSERTクエリーが失敗しました。' . mysql_error());
		}
	}
	
	$_SESSION["id"] = $id;
	jump();
} else {
	$params = array('scope' => 'read_stream', 'redirect_uri' => url."php/fb_aouth.php");
	$loginUrl = $facebook -> getLoginUrl($params);
	header('Location: ' . $loginUrl);
	exit ;
}
?>