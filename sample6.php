<?php
$error = "";
//エラー
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$moji = $_POST['moji'];
	$kugiri = $_POST['kugiri'];
	if (isset($_POST['submit'])) {
		//チェック
		foreach ($moji as $key => $value) {
			$moji[$key] = htmlspecialchars($value, ENT_QUOTES);
			//タグを無効化
		}
		//echo $moji[0];
		//cookieに保存
		$cookvalue = implode(",", $moji);
		setcookie("php20030727", $cookvalue, time() + 30 * 24 * 3600);
		//var_dump($_COOKIE);
	}
	if (isset($_POST['submit_del'])) {
		//cookie削除
		setcookie("php20030727");
		//削除
	}
	//普通は必要ないが表示確認のためリダイレクト
	header("Location:" . $_SERVER['SCRIPT_NAME']);
}
?>
<html>
	<head>
		<meta http-equiv = "Content-type" content = "text/html; charset = utf-8">
		<META HTTP-EQUIV="Cache-control" CONTENT="no-cache">
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<title>2003/07/27</title>
	</head>
	<body>
		<font size = "2">
			<center>
				<br>
				<br>
				<b>cookieに保存！</b>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
		</font>
		<br>
		cookieに保存する言葉を入れてね。
		<br>
		<font size = "2">
			<form action = "<?php echo $_SERVER['SCRIPT_NAME'];?>" METHOD = "POST">
				<?php
				if ($error == "" && isset($_COOKIE["php20030727"])) {
					$moji = explode(",", $_COOKIE["php20030727"]);
				}
				echo '
				(1)
				<input type = "text" name = "moji[0]" value = ' .$moji[0]. '>
				<br>
				(1)
				<input type = "text" name = "moji[1]" value = ' .$moji[1]. '>
				<br>
				(1)
				<input type = "text" name = "moji[2]" value = ' .$moji[2]. '>
				<br>
				(1)
				<input type = "text" name = "moji[3]" value = ' .$moji[3]. '>
				<br>
				'
				;
				?>
				<input type = "submit" name = "submit" value="Cookieに保存">
				<br>
				<br>
				<input type = "submit" name = "submit_del" value="Cookieを削除">
				<br>
				<br>
			</form> </font>
		<br>
		<br>
		<br>
		</center>
	</body>
</html>
