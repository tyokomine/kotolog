<a href="#myModal" class="feedback_btn" data-toggle="modal">ご意見・ご感想</a>
<div class="modal hide" id="myModal">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">x</a>
		<h3>ご意見・ご感想</h3>
	</div>
	<div class="modal-body span6">
		<p>
			なんでもお気軽にご記入ください。
		</p>
		<form id="feedback" method="POST" name="feedback" action="./php/feedback.php">
			<textarea class="textarea span6" id="textarea" rows="6" name="message">例. 最高のサービスだと思います。応援しています！</textarea>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary">
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	</div>
	</form>
</div>
<div class="modal hide" id="createNewBoard">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">x</a>
		<h3>新しいボードを作る</h3>
	</div>
	<div class="modal-body" align="center">
		<form id="newBoardForm" method = "post"　name = "newBoardForm" action = "./php/add_category.php">
			<div class="input" align="center">
				<input type="text" id="category" name ="category">
				<br>
				<input type="submit" value="ボードを追加" class="btn btn-primary" >
			</div>
		</form>
	</div>
</div>
<div class="modal hide" id="addMemo">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">x</a>
		<h3>メモを追加</h3>
	</div>
	<form id="addMemoForm" method="post" name = "addMemoForm" action = "./php/add_memo.php">
		<div class="modal-body">
			<div class="clearfix">
				<textarea name = "contents" class="xxlarge span6" id="memo_content" rows="5"></textarea>
			</div>
			<div class="clearfix">
				<label for="citation">引用元 :</label>
				<div class="input">
					<input type="text" class="xlarge" id="citation" name="citation">
				</div>
			</div>
			<div class="clearfix">
				<label for="category">カテゴリ :</label>
				<select name="category"	id="category">
					<?php
					error_reporting(1);
					session_start();

					require_once 'php/config.php';
					require_once 'php/commons.php';

					//セッションからid取得
					$id = $_SESSION["id"];
					//DBからカテゴリ取得
					$category_sql = "select distinct category_name from category where category_member_id =" . r($id) . "";
					$category_result = mysql_query($category_sql);

					while ($category = mysql_fetch_assoc($category_result)) {
						echo '<option>' . $category["category_name"] . '</option>';
					}
					?>
				</select>
				<!-- <a href="#createNewBoard" data-toggle="modal">Create New Board</a> -->
			</div>
			<div class="actions">
				<input name = "add_memo" type="submit" value="Add Memo" class="btn btn-primary">
				<button type="reset" class="btn" data-dismiss="modal">
					Cancel
				</button>
			</div>
		</div>
	</form>
</div>

<div class="modal hide" id="UpdateMemo">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">x</a>
		<h3>メモを編集</h3>
	</div>
	<form id="UpdateForm" method="post" name = "updateForm" action = "./php/update_memo.php">
		<div class="modal-body">
			<div class="clearfix">
				<textarea name = "contents" class="xxlarge span6" id="up_memo_content" rows="5"></textarea>
			</div>
			<div class="clearfix">
				<label for="citation">引用元 :</label>
				<div class="input">
					<input type="text" class="xlarge" id="up_citation" name="citation">
				</div>
			</div>
			<div class="clearfix">
				<label for="category">カテゴリ :</label>
				<select name="category"	id="category">
					<?php
					error_reporting(1);
					session_start();

					require_once 'php/config.php';
					require_once 'php/commons.php';

					//セッションからid取得
					$id = $_SESSION["id"];
					//DBからカテゴリ取得
					$category_sql = "select distinct category_name from category where category_member_id =" . r($id) . "";
					$category_result = mysql_query($category_sql);

					while ($category = mysql_fetch_assoc($category_result)) {
						echo '<option>' . $category["category_name"] . '</option>';
					}
					?>
				</select>
			</div>
			<div class="actions">
				<input name = "update_memo" type="submit" value="Update Memo" class="btn btn-primary">
				<button type="reset" class="btn" data-dismiss="modal">
					Cancel
				</button>
			</div>
		</div>
	</form>
</div>