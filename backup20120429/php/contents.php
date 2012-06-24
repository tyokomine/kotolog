<div class="container-ralative">
	<div id="contentArea">
	<?php
	error_reporting(1);
	session_start();
	//test用の設定
	require_once 'config.php';
	require_once 'commons.php';
	
	//セッションからid取得
	$id = $_SESSION["id"];
	//DBからメモ取得
	$sql = "select memo_contents,memo_citation,memo_category from memo where memo_member_id =".r($id)."";
    $result = mysql_query($sql);
	
	//urlからカテゴリ情報取得
	$category=$_GET["category"];
	
	while ($memo = mysql_fetch_assoc($result)) {
		//カテゴリの指定あり
		if(isset($category)){
			if(isset($memo["memo_contents"]) && $memo["memo_category"]==$category) {
				show_contents($memo);
			}
		}
		//カテゴリ指定なし
		else{
			if(isset($memo["memo_contents"])) {
					show_contents($memo);
			}
		}
	}
	?>

	</div>
</div>
	