<?php

error_reporting(1);
session_start();

//データベース選択
$link = mysql_connect('localhost', 'root', 'veste5687');
//データベース接続
if (!$link) {
	die('接続失敗です。' . mysql_error());
}
$db_selected = mysql_select_db(database, $link);
if (!$db_selected) {
	die('データベース選択失敗です。' . mysql_error());
}

function r($s) {
	return mysql_real_escape_string($s);
}

function jump($s) {
	header('Location: ' . url . $s);
	exit ;
}

//コンテンツを表示する関数
function show_contents(&$memo) {
	// 70文字以上の場合、 71文字目以降を(read more..)に置換する
	$contents = $memo['memo_contents'];
	//echo mb_strlen($contents)/3;
	if(mb_strlen($contents)/3 >= 70){
		$contents = substr($contents, 0, 180) . "<br/><br/> <span width='134px' style='color:#999999; margin-left:140px'>read more...</span>";
	}
	$flag = "Tile2"; // 自分以外のメモ
	if($memo["memo_member_id"] == $_SESSION["id"]){
		$flag = "Tile"; // 自分のメモ
	}
	
	echo '<div class="'. $flag .'">
			<span class="DispTileContents">' .$contents . '</span><span class="TileCitation">' . $memo["memo_citation"] . 
				'</span><span class="TileCategory">' . $memo["memo_category"] . '</span><span class="TileContents" style="display:none">' .$memo['memo_contents']. '</span>
  		</div>';
}

function getRandomString($nLengthRequired = 8) {
	$sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
	mt_srand();
	$sRes = "";
	for ($i = 0; $i < $nLengthRequired; $i++) {
		$sRes .= $sCharList[mt_rand(0, strlen($sCharList) - 1)];
	}
	return $sRes;
}
?>