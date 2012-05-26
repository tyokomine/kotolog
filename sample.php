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
		//メインコンテンツ（メモ）部分の呼び出し
		require './php/contents.php';
		//モーダルとか
		require './php/add_modal.php';
		?>
		</div><div id='glayLayer'></div>
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
