<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ことろぐ -忘れたくない大切な言葉-</title>
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/parally.css" rel="stylesheet">
		<link href="./css/top.css" rel="stylesheet">
	</head>
	<body>
		<?php
		error_reporting(1);
		session_start();

		require_once './php/config.php';
		require_once './php/commons.php';
		
		require './php/header.php';


		?>
		<div id="user_rgst_main">
			<div id="user_rgst_title">
				setting
			</div>
			<div id="user_rgst_subtitle">
				ことろぐへようこそ！
				<br>
				登録情報を変更しよう！
			</div>
			<form action="./php/edit.php" method="post">
				<dl id="index_form">
					<?php
					error_reporting(1);
					session_start();

					require_once './php/config.php';
					require_once './php/commons.php';

					if (isset($_SESSION["id"])) {//ログイン状態だったら
						//value取りに行く
						//セッションからid取得
						$id = $_SESSION["id"];
						//DBからメモ取得
						$sql = "select member_en_name,member_mail,member_password from member where member_id =" . r($id) . "";
						$result = mysql_query($sql);
						
						$member = mysql_fetch_assoc($result);
						$name = $member["member_en_name"];
						$mail = $member["member_mail"];
						$password = $member["member_password"];
						echo '<dt>
						name
					</dt>
					<dd>
						<input name="name" type="text" value='.$name.' size ="30" />
					</dd>
					<dt>
						e-mail
					</dt>
					<dd>
						<input name="mail" type="text" value='.$mail.' />
					</dd>
					<dt>
						password
					</dt>
					<dd>
						<input name="password" type="text" value='.$password.' />
					</dd>';

					}else{
					echo '<dt>
						name
					</dt>
					<dd>
						<input name="name" type="text" size ="30" />
					</dd>
					<dt>
						e-mail
					</dt>
					<dd>
						<input name="mail" type="text"  />
					</dd>
					<dt>
						password
					</dt>
					<dd>
						<input name="password" type="text" />
					</dd>';	
					}
					
					?>
					
				</dl>
				<div id="rgst_btn">
					<input name="action" type="submit" value="set" />
					<a href="./index.php" class="btn" data-dismiss="modal">Cancel</a>
				</div>
			</form>
		</div>
	</body>
</html>