<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="../sample.php" onclick="login();">ことろぐ</a>
			<form class="navbar-search pull-left" method="post" name = "search" id = "search" action="./search.php">
				<!-- 				<input type="text" class="search-query span2" placeholder="search" data-provide="typeahead" data-items="3" data-source='["人生山あり谷あり","わが人生に悔いなし","それが人生なのよさ","だから人生はおもしろい"]'/> -->
				<?php
				error_reporting(1);
				session_start();
				require_once 'config.php';
				require_once 'commons.php';

				if (isset($_POST["action"]) && $_POST["action"] === "set") {//POSTされたactionの値がsign inだったら
					$id = $_SESSION["id"];

					$name = $_POST['name'];
					$mail = $_POST['mail'];
					$password = $_POST['password'];

					$sql = "update member set member_en_name = '" . r($name) . "',member_mail = '" . r($mail) . "',member_password = '" . r($password) . "',member_access_date = now()
			where member_id =" . r($id) . "";
					$result_flag = mysql_query($sql);
					//echo $sql;
					if (!$result_flag) {
						die('updateクエリーが失敗しました。' . mysql_error());
					}
				}

				if (isset($_POST["query"]) || isset($_SESSION["query"])) {
					if (isset($_POST["query"])) {
						$value = $_POST["query"];
						$_SESSION["query"] = $value;
					} else {
						$value = $_SESSION["query"];
					}
					echo '<input name="query" type="text" class="search-query span2" placeholder="search" data-provide="typeahead" data-items="3" value=' . $value . ' />';
				} else {
					echo '<input name="query" type="text" class="search-query span2" placeholder="search" data-provide="typeahead" data-items="3" />';
				}
				?>

				<a class="btn" ><i class="icon-search"></i></a>
			</form>
			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> About <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
							<a href="./team.php">Team</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<?php
					error_reporting(1);
					session_start();
					require_once 'config.php';
					require_once 'commons.php';
					//セッションからid取得
					$id = $_SESSION["id"];
					//DBからカテゴリ取得
					$sql = "select distinct member_en_name from member where member_id =" . r($id) . "";
					$result = mysql_query($sql);
					$name = mysql_fetch_array($result);
					echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"> ' . $name[0] . '<span class="caret"></span> </a>';
					?>
					<ul class="dropdown-menu">
						<li>
							<a href="">Invite Friends</a>
						</li>
						<li>
							<a href="./setting.php">Setting</a>
						</li>
						<li>
							<a href="./php/logout.php">Logout</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="nav pull-right">
				<li>
					<a href="#addMemo" data-toggle="modal"> Add+ </a>
				</li>
			</ul>
		</div>
	</div>
</div>