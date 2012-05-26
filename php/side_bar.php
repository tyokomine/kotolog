 <div id="side-bar-cursor" class="side-bar-cursor">
	<a title="cursor"><i id="cursor-icon" class="icon-chevron-right"></i></a>
</div>
<div id="side-bar" class="side-bar">
	<ul class="nav nav-list" id="boards">
		<li class="nav-header">
			Change Board
		</li>
		<?php
			error_reporting(1);
			session_start();
			//test用の設定
			require_once 'config.php';
			require_once 'commons.php';
	
			//セッションからid取得
			$id = $_SESSION["id"];
			//DBからカテゴリ取得
			$category_sql = "select distinct category_name from category where category_member_id =".r($id)."";
			$category_result = mysql_query($category_sql);
			while ($category = mysql_fetch_assoc($category_result)) {
				echo '<li class="side_item">'.
					'<a href="./sample.php?category='.$category["category_name"].'">'.$category["category_name"].'</a>
					 </li>';
			}
		?>
	</ul>
	<ul class="nav nav-list">
		<li class="nav-header">
			Edit Board
		</li>
		<li>
			<a href="#createNewBoard" data-toggle="modal">Create New Board</a>
		</li>
	</ul>
	<a id="delBoard" onclick="deleteBoard()">☓</a>
</div>
	