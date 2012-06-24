<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ことろぐ -忘れたくない大切な言葉-</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/parally.css" rel="stylesheet">
		<link href="../css/top.css" rel="stylesheet">
	</head>
	<body>
		<?php
		error_reporting(1);
		session_start();

		require_once './config.php';
		require_once './commons.php';

		if (isset($_POST["action"]) && $_POST["action"] === "とうろく") {//POSTされたactionの値がsign inだったら
			//DBに新規ユーザを追加
			// settype($mail,string);
			$name = $_POST['name'];
			$mail = $_POST['mail'];
			$password = $_POST['password'];

			$sql = "insert into member (member_en_name,member_mail,member_password,member_is_valid,member_regi_date,member_access_date)
			 values ('" . r($name) . "','" . r($mail) . "','" . r($password) . "',1,now(),now())";
			$result_flag = mysql_query($sql);
			//echo $sql;
			if (!$result_flag) {
				die('INSERTクエリーが失敗しました。' . mysql_error());
			}

			//id取得
			$sql = "select member_id from member where member_mail ='" . r($mail) . "'" . " and member_en_name = '" . r($name) . "'";
			$result = mysql_query($sql);
			$id = mysql_fetch_array($result);
			$category = Home;

			//カテゴリHomeを追加
			$sql = "insert into category (category_member_id,category_name,category_add_date,category_update_date)
			 values (" . r($id[0]) . ",'" . r($category) . "',now(),now())";
			$result_flag = mysql_query($sql);
			if (!$result_flag) {
				die('INSERTクエリーが失敗しました。' . mysql_error());
			}

			//メールを送信する
			mb_language("Japanese");
			$to = $_POST['mail'];
			$message = "<a href=http://kotolog/sample.html>home</a>";
			$subject = mb_convert_encoding("Thank you for join kotolog!!", "UTF-8", "ASCII");
			$subject = mb_encode_mimeheader($subject, "UTF-8");
			$message = mb_convert_encoding($message, "UTF-8", "ASCII");

			$headers = 'From: ' . $_POST['mail'] . '' . "\r\n" . 'Reply-To: ' . $_POST['mail'] . '' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
			//echo $to;
			if (mb_send_mail($to, $subject, $message, $headers)) {
				//echo "送信完了、ありがとうございました。";
				jump("../index.php");
			} else {
				echo "エラー：送信に失敗しました";
			}

		}
		?>
		<div id="user_rgst_main">
			<div id="user_rgst_title">
				Welcome!
			</div>
			<div id="user_rgst_subtitle"> ことろぐへようこそ！
				<br>
				ササッと登録してさっそくはじめましょう！ </div>
			<form action="../index.php" method="post">
				<dl id="index_form">
					<dt>
						name
					</dt>
					<dd>
						<input name="name" type="text" value="z.ibra.veste@gmail.com" size ="30" />
					</dd>
					<dt>
						e-mail
					</dt>
					<dd>
						<input name="mail" type="text" value="kotolog" />
					</dd>
					<dt>
						password
					</dt>
					<dd>
						<input name="password" type="text" value="kotolog" />
					</dd>
				</dl>
				<div id="rgst_btn">
					<input name="action" type="submit" value="登録" />
				</div>
			</form>
		</div>
	</body>
</html>