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
		$query = $_SESSION["query"];
		if($_GET["type"]=="memo"){
			//DBからメモ取得。本文検索
			$sql = 'select memo_contents,memo_citation,memo_category from memo where memo_contents like "%' . r($query) . '%"';
		}else if($_GET["type"]=="citation"){
			//DBからメモ取得。本文検索
			$sql = 'select memo_contents,memo_citation,memo_category from memo where memo_citation like "%' . r($query) . '%"';
		}else if($_GET["type"]=="category"){
			//DBからメモ取得。本文検索
			$sql = 'select memo_contents,memo_citation,memo_category from memo where memo_category like "%' . r($query) . '%"';
		}else{
			//DBからメモ取得。本文検索
			$sql = 'select memo_contents,memo_citation,memo_category from memo where memo_contents like "%' . r($query) . '%"';	
		}
		
		
		$result = mysql_query($sql);

		while ($memo = mysql_fetch_assoc($result)) {
			//カテゴリ・クエリの指定なし
			if (isset($memo["memo_contents"])) {
				show_contents($memo);
			}
		}
		?>
	</div>
</div>
