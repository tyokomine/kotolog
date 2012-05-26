<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ことろぐ -忘れたくない大切な言葉-</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/parally.css" rel="stylesheet">
		<link href="css/top.css" rel="stylesheet">
	</head>
	<body id="body">
		<?php
		//ヘッダー部分の呼び出し
		require './php/header.php';
		//サイドバーの呼び出し
		require './php/side_bar.php';
		if (isset($_POST["query"])) {
			echo '<div id="ContextBar">
					<span class="selected">メモ</span>
					・<a href="./search.php?type=citation">引用元</a>
					・<a href="./search.php?type=category">カテゴリ</a>
				</div>';
		}else if(isset($_GET["type"])){
			if($_GET["type"]=="memo"){
			echo '<div id="ContextBar">
					<span class="selected">メモ</span>
					・<a href="./search.php?type=citation">引用元</a>
					・<a href="./search.php?type=category">カテゴリ</a>
				</div>';
			}else if($_GET["type"]=="citation"){
			echo '<div id="ContextBar">
					 <a href="./search.php?type=memo">メモ</a>
					・<span class="selected">引用元</span>
					・<a href="./search.php?type=category">カテゴリ</a>
				</div>';		
			}else if($_GET["type"]=="category"){
				echo '<div id="ContextBar">
					 <a href="./search.php?type=memo">メモ</a>
					・<a href="./search.php?type=citation">引用元</a>
					・<span class="selected">カテゴリ</span>
				</div>';	
			}
			
		}
		//メインコンテンツ（メモ）部分の呼び出し

		require './php/search_result_contents.php';
		//モーダルとか
		require './php/add_modal.php';
		?>
		<div id='glayLayer'></div>
		<div id='overLayer'>
			<div id="ShowContents"></div>
			<div align="right" id="ShowButtons"></div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/top.js"></script>
		<script src="js/parally.js"></script>
	</body>
</html>
