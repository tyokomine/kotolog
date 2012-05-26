<?php
error_reporting(1);
session_start();
//test用の設定
define("PASSWORD", "kotolog");
define("MAIL", "z.ibra.veste@gmail.com");
define("database","kotolog");

//データベース選択
$link = mysql_connect('localhost', 'root', 'veste5687');//データベース接続
if (!$link) {
    die('接続失敗です。'.mysql_error());
}
$db_selected = mysql_select_db(database, $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}
if(isset($_POST["action"])&&$_POST["action"]==="とうろく"){//POSTされたactionの値がsign inだったら
    //DBに新規ユーザを追加
   // settype($mail,string);
    $name = $_POST['name'];
    $mail = $_POST['mail'];
	$password = $_POST['password'];
	//echo $mail;

	$sql = "insert into member (member_en_name,member_mail,member_password,member_is_valid,member_regi_date,member_access_date)
			 values ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($mail)."','".mysql_real_escape_string($password)."',1,now(),now())";
			$result_flag = mysql_query($sql);
			//echo $sql;
			if (!$result_flag) {
			    die('INSERTクエリーが失敗しました。'.mysql_error());
			}
   
   //メールを送信する
   mb_language("Japanese");
   $to = $_POST['mail'];
   $message = "<a href=http://kotolog/sample.html>home</a>";	
   $subject = mb_convert_encoding("Thank you for join kotolog!!","UTF-8","ASCII");
   $subject = mb_encode_mimeheader($subject,"UTF-8");
   $message = mb_convert_encoding($message,"UTF-8","ASCII");
   
   $headers = 'From: '.$_POST['mail'].'' . "\r\n" .
    'Reply-To: '.$_POST['mail'].'' . "\r\n" .
    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
   //echo $to;
   if(mb_send_mail($to, $subject,$message, $headers)){
       //echo "送信完了、ありがとうございました。";	
	   header("Location: http://kotolog/index.php");
   }else{
        echo "エラー：送信に失敗しました";
   }
   
}
?>

<form action="" method="post">
	name<input name="name" type="text" value="tyokomine" size ="30" /><br>
	e-mail<input name="mail" type="text" value="z.ibra.veste@gmail.com" size ="30" /><br>
	passward<input name="password" type="text" value="kotolog" /><br>
	
	<input name="action" type="submit" value="とうろく" />
</form>