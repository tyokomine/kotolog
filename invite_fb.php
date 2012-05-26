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
		//モーダルとか
		require './php/add_modal.php';
		?>
		<div class="container-ralative">
			<div style="
			width: 1100px;
			margin: 0px 70px -40px;
			padding: 10px;
			border-bottom: 3px double #333;
			font-size: 30px;
			">
				INVITE FRIENDS
			</div>
			<div style="
			margin: 60px 70px -40px;

			">
				<span class="selected">Facebook</span>
				・<a href="./invite_tw.php">Twitter</a>
			</div>
			<div id="contentArea">
				<div class="Tile">
					<p style="font-size: 16px; margin: 30px 20px 10px">
						Emailで友人を招待できます。
					</p>
					<p style="font-size: 14px; margin: 20px 20px 0px">
						Emailアドレス
					</p>
					<form style="font-size: 20px; margin: 5px 20px;">
						<input type="text" size="20"/>
						<a class="btn btn-primary" style="
						position: absolute;
						bottom: 20px;
						left: 55%;
						font-size: 12pt;
						">招待する</a>
					</form>
				</div>
				<div class="Tile">
					<div style="margin: 10px; float:left"><img src="./img/ieiri.jpg" width="100px" height="100px">
					</div>
					<span class="TileContents">おっぱいです</span>
					<span class="TileCitation">家入一真</span>
					<a class="btn btn-primary" style="
					position: absolute;
					bottom: 20px;
					left: 55%;
					font-size: 12pt;
					">招待する</a>
				</div>
				<div class="Tile">
					<div style="margin: 10px; float:left"><img src="./img/yosumi.jpg" width="100px" height="100px">
					</div>
					<span class="TileContents">吉田剛君おすすめの四角大輔と申します！</span>
					<span class="TileCitation">四角大輔</span>
					<a class="btn btn-primary" style="
					position: absolute;
					bottom: 20px;
					left: 55%;
					font-size: 12pt;
					">招待する</a>
				</div>
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/top.js"></script>
		<script src="js/parally.js"></script>
	</body>
</html>
