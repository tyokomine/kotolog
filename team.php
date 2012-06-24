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
			">TEAM</div>
			<div id="contentArea">
				<div class="Tile" style="
				width: 520px;
				height: 380px;
				background-color: White;
				margin: 10px;
				padding: 20px;
				float: left;
				text-shadow: 0 1px 0 #fff;
				-webkit-box-shadow: 0 15px 10px rgba(0,0,0, 0.7);
				-moz-box-shadow: 0 15px 10px rgba(0, 0, 0, 0.7);
				box-shadow: 0 15px 10px rgba(0, 0, 0, 0.7);">
					<div style="
					margin: 10px 10px 30px;
					line-height: 1.2;
					font-size: 60px;
					">「WKTCODER」</div>
					<span style="font-size: 22px; line-height: 1.2">神戸大学出身の横峯、平松、西原で結成された<br/>歌って踊れるエンジニアユニット。<br/>渋谷、五反田、虎ノ門を中心にゆるりと活動中。</span>
				</div>
				<div class="Tile">
					<img src="img/member1.png">
				</div>
				<div class="Tile">
					<span class="TileContents">Make the world more open and connected！</span>
					<span class="TileCitation">横峯樹</span>
				</div>
				<div class="Tile">
					<span class="TileContents">モットーは「Life with FUN！」</span>
					<span class="TileCitation">平松亮介</span>
				</div>
				<div class="Tile">
					<img src="img/member2.png">
				</div>
				<div class="Tile">
					<span class="TileContents">スキルセット<br/><ul><li>フロントエンド<br/>html, css, javascript<li>バックエンド<br/>php, mysql, perl<li>その他もろもろ<br/>C, Java, Perl, Unity, etc.</ul></span>
				</div>
				<div class="Tile">
					<span class="TileContents">これまでの実績<br/><ul><li>なし</ul></span>
				</div>
				<div class="Tile">
					<img src="img/member3.png">
				</div>
				<div class="Tile">
					<span class="TileContents">Designgineerになる！</span>
					<span class="TileCitation">西原聖志</span>
				</div>
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/top.js"></script>
		<script src="js/parally.js"></script>
	</body>
</html>
