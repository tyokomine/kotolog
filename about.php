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
				ABOUT
			</div>
			<div id="contentArea">
				<div class="Tile">
					<span class="TileContents">最近読書にハマっています！
						<br/>
						え、内容ですか？…えーっと…</span>
					<span class="TileCitation">F氏</span>
				</div>
				<div class="Tile">
					<span class="TileContents">これからの行動を変えようと思って自己啓発本を読んでるんです。でもすぐ内容を忘れてしまって。。</span>
					<span class="TileCitation">Y氏</span>
				</div>
				<div class="Tile">
					<span class="TileContents">本田さんのレバレッジ・リーディングを読んで実践しようとおもっています！</span>
					<span class="TileCitation">A氏</span>
				</div>
				<div class="Tile">
					<span class="TileContents">名言・格言を毎日見る習慣をつけたいんですがなんとも続かなくて…</span>
					<span class="TileCitation">X氏</span>
				</div>
				<div class="Tile" style="
				width: 1100px;
				height: 400px;
				background-color: White;
				margin: 20px 10px 10px;
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
					">
						「ことろぐ」がその悩みを解決します。
					</div>
					<div style="font-size: 20px; line-height: 1.2;padding-left:50px ">
						本で出会った忘れたくない「コトバ」<br/>
						尊敬する人からもらった大切な「コトバ」<br/>	
						ことろぐはそんな自分だけの大切な「コトバ」のログを残せるサービスです。<br/>
						大切にしたい「コトバ」に出会ったとき<br/>
						忘れたくない「コトバ」に出会ったとき<br/>
						そんな「コトバ」をことろぐに残しましょう！<br/>
						振り返るとそこにあなただけの大切な「コトバ」がたくさんあります<br/>
					</div>
				</div>
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/top.js"></script>
		<script src="js/parally.js"></script>
	</body>
</html>
